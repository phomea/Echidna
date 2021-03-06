<?php
namespace applications\anagraficaimmobili\applicazioni;

use applications\anagraficaimmobili\AnagraficaImmobiliApplication;
use applications\anagraficaimmobili\entities\Aggregatore;
use applications\anagraficaimmobili\entities\Contatore;
use applications\anagraficaimmobili\entities\Edificio;
use applications\anagraficaimmobili\entities\LetturaAggregata;
use applications\anagraficaimmobili\entities\LetturaContatore;
use applications\anagraficaimmobili\entities\TipoAggregatore;
use applications\anagraficaimmobili\entities\UnitaAbitativa;
use applications\login\LoginApplication;
use applications\main\entities\Notification;
use applications\main\MainBackend;
use applications\meta\entities\Meta;
use Aura\Sql\Exception;
use core\Config;
use core\Email;
use core\Model;
use core\Route;
use core\RouteFilter;
use core\services\Db;
use core\services\EmailService;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;
use function MongoDB\BSON\fromJSON;


class LettureContatoriBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return AnagraficaImmobiliApplication::class;
    }

    static function getEntityClass()
    {
        return LetturaContatore::class;
    }

    public static function actionAdd($params = [])
    {
        $m = parent::actionMod($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Nuova Lettura singolo Contatore";
        return $m;
    }

    public static function actionMod($params = [])
    {
        $m = parent::actionMod($params); // TODO: Change the autogenerated stub
        $m[1]["title"] = "Modifica Lettura singolo Contatore: ".$m[1]["data"]->id;
        return $m;
    }

    public static function actionList($params = [])
    {
        $m = parent::actionList($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Elenco Letture singoli Contatori";
        return $m;
    }


    static function actionImport($params = [])
    {

        $r = parent::actionImport($params); // TODO: Change the autogenerated stub


        $r[1]["extraValues"] = [
            "idLetturaAggregata"    =>  [
                "type"=>"hidden",
                "value"=>$params['idLetturaAggregata']
            ]
        ];

        return [
            "anagraficaimmobili/templates/letturecontatori.import",$r[1]
        ];
    }


    static function actionImportSave($params = [], $post = [])
    {


        $nuoviContatori = [];
        $contatoriMancanti = [];
        $contatoriConErrori = [];

        $letturaAggregata = LetturaAggregata::findById($post['fixedValues']['idLetturaAggregata']);


        $ll = LetturaContatore::query(true)
            ->where("idLetturaAggregata=".$letturaAggregata->id)->getAll();

        if( !empty($ll)){
            foreach ($ll as $v){
                /**
                 * @var $v Model
                 */
                $v->remove();
            }
        }

        $idAggregatore = $letturaAggregata->idAggregatore;
        $aggregatore = Aggregatore::findById($idAggregatore);
        $idCondominio = $aggregatore->idCondominio;
        $tipoAggregatore = TipoAggregatore::findById($aggregatore->idTipologiaAggregatore);

        $formatoData = "Y-m-d";
        if( !empty($tipoAggregatore->formatoData) ){
            $formatoData = $tipoAggregatore->formatoData;
        }

        /* Recupero l'elenco totale di tutti i contatori del condominio - inizio */
        //Cerco il contatore associato a questo condominio tra le unità abitative
        $contatori_ua = Contatore::query(true)
            ->setFields(Contatore::getTable().".*")
            ->join(UnitaAbitativa::getEntity(),"id","idUnitaAbitativa")
            ->join(Edificio::getEntity(),"id","idEdificio", UnitaAbitativa::class)
            ->where(Edificio::getTable().".idCondominio=" . $idCondominio)
            ->getAll();

        //Potrebbe essere tra i contatori esistenti ma associati all'edificio
        $contatori_ed = Contatore::query(true)
            ->setFields(Contatore::getTable().".*")
            ->join(Edificio::getEntity(),"id","idEdificio")
            ->where(Edificio::getTable().".idCondominio=" . $idCondominio)
            ->getAll();

        $contatori = array_merge($contatori_ua,$contatori_ed);
        $contatori_impostati = [];
        /* Recupero l'elenco totale di tutti i contatori del condominio - fine */



        $colonnaMatricola = $tipoAggregatore->colonnaMatricola;
        $colonnaLettura = $tipoAggregatore->colonna;
        $colonnaData = $tipoAggregatore->colonnaTimestampCampionamento;

        $letturadireset = (int)$post["resetImport"];
        $dataletturadireset = $post["dataImport"];
        if($letturadireset=="1"){
            //Lettura di reset


            foreach($contatori as $contatore){
                $nuovaLettura = new LetturaContatore([
                    "idContatore"  =>  $contatore->id,
                    "idLetturaAggregata"    =>  $letturaAggregata->id
                ]);
                $nuovaLettura->valoreLettura = 0;
                $nuovaLettura->deltaLettura = 0;
                $nuovaLettura->dataLettura = $dataletturadireset;
                $nuovaLettura->save();

                $contatori_impostati[$contatore->id]=1;
            }



            //fine lettura di reset
            //
        }else{
            //Lettura normale da CSV

            $fieldNamesCSV = [];
            $valuesInCSV = [];

            $first = false;


            if( ($handle = fopen($_FILES['csvToImport']['tmp_name'],"r"))  !== false){
                if($tipoAggregatore->intestazioni == 1){
                    $first = true;
                }

                while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {



                    $data=static::remove_utf8_bom($data);


                    if($first){



                        $fieldNamesCSV = $data;
                        $first = false;
                    }else{


                        $valuesInCSV[]=$data;
                    }

                    $row++;

                }
                fclose($handle);
            }

            $data_default = date("Y-m-d");

            foreach ($valuesInCSV as $key=>$value){
                $datimancanti = false;

                $matricola = ltrim($value[$colonnaMatricola -1 ], '0');

                if((trim($matricola)=="")||(empty($matricola)))
                    continue;


                $lettura = $value[$colonnaLettura - 1];
                if(empty($lettura)){
                    //$datimancanti = true;
                    $lettura = 0;
                }

                /*$date = str_replace('/', '-', $value[$colonnaData - 1] );


                $data = date("Y-m-d", strtotime($date));*/

                $data_create = date_create_from_format($formatoData,$value[$colonnaData - 1]);
                if($data_create){
                    $data = date_format($data_create,"Y-m-d");
                    $data_default = $data;
                }else{
                    $data = $data_default;
                    $datimancanti = true;
                }


                //Cerco il contatore associato a questo condominio tra le unità abitative
                $contatore = Contatore::query(true)
                    ->setFields(Contatore::getTable().".*")
                    ->join(UnitaAbitativa::getEntity(),"id","idUnitaAbitativa")
                    ->join(Edificio::getEntity(),"id","idEdificio", UnitaAbitativa::class)
                    ->where(Contatore::getTable().".codice=".Contatore::formatToSql("codice",$matricola))
                    ->where(Edificio::getTable().".idCondominio=" . $idCondominio)
                    ->getOne();

                if(!$contatore){
                    //Potrebbe essere tra i contatori esistenti ma associati all'edificio
                    $contatore = Contatore::query(true)
                        ->setFields(Contatore::getTable().".*")
                        ->join(Edificio::getEntity(),"id","idEdificio")
                        ->where(Contatore::getTable().".codice=".Contatore::formatToSql("codice",$matricola))
                        ->where(Edificio::getTable().".idCondominio=" . $idCondominio)
                        ->getOne();

                }

                if( !$contatore ){
                    //non ho trovato il contatore in questo condominio. Lo associo come contatore generale

                    $edificio = Edificio::query(false)->where("idCondominio=".$idCondominio)
                        ->getOne();
                    $contatore =  new Contatore([
                        "destinazioneDispositivo"   =>  3,
                        "idEdificio" => $edificio->id,
                        "codice"    =>  $matricola,
                        "tipoDispositivo"   =>  2

                    ]);

                    $contatore->save();

                    $nuoviContatori[]=$contatore->id;
                }

                $ultimaLettura = LetturaContatore::query(true)
                    ->where("idContatore=".$contatore->id)
                    ->where("dataLettura<'".$data."'")
                    ->setOrderBy("dataLettura","DESC")->getOne();



                $nuovaLettura = new LetturaContatore([
                    "idContatore"  =>  $contatore->id,
                    "idLetturaAggregata"    =>  $letturaAggregata->id
                ]);



                if( $ultimaLettura ) {
                    $delta = (float)str_replace(",", ".", str_replace("'", "", $lettura)) - (float)$ultimaLettura->valoreLettura;
                }else{
                    $delta = 0;
                }


                if($delta < 0 ){
                    if($contatore->meseDiReset == ((int)date_format(date_create_from_format("Y-m-d",$data),"m")) ){
                        // siamo nel mese di reset
                        $delta = $lettura;
                        Notification::notify("Reset su contatore $matricola",$value);
                    }else{

                        // TODO: capire cosa fare in caso di lettura sbagliata
                        Notification::notify("Lettura sbagliata su contatore $matricola",$value);
                    }
                }

                $contatori_impostati[$contatore->id]=1;


                $nuovaLettura->valoreLettura = $lettura;
                $nuovaLettura->deltaLettura = $delta;
                $nuovaLettura->dataLettura = $data;
                $nuovaLettura->save();

                if($datimancanti){
                    // TODO: manca la data o il valore letto dal contatore
                    Notification::notify("Lettura sbagliata su contatore $matricola",$value);
                    $contatoriConErrori[] = $nuovaLettura->id;
                }

            }

            //fine lettura standard
        }

        //Chiudo e restituisco i risultati

        //controllo di aver inizializzato tutti i contatori
        foreach($contatori as $contatore){
            if($contatori_impostati[$contatore->id]!=1){
                $contatoriMancanti[] = $contatore->id;
            }
        }


        $params = [
            "id"=>$letturaAggregata->id,
            "tab"   =>  "1-tab"
        ];

        if( !empty($nuoviContatori) ){
            $params["nuoviContatori"] = implode(",",$nuoviContatori);
        }
        if( !empty($contatoriConErrori) ){
            $params["contatoriConErrori"] = implode(",",$contatoriConErrori);
        }
        if( !empty($contatoriMancanti) ){
            $params["contatoriMancanti"] = implode(",",$contatoriMancanti);
        }

        return Response::redirect( RouterService::getRoute(LetturaAggregata::getEntity().".mod")->build($params),null);


    }
}

