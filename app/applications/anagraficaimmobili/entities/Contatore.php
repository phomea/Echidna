<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\UnitaAbitativa;
use applications\anagraficaimmobili\entities\Stanza;
use applications\anagraficaimmobili\entities\TipoContatore;
use applications\anagraficaimmobili\entities\Aggregatore;
use core\services\Request;


class Contatore extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?


            "destinazioneDispositivo"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Dispositivi delle Unità Abitative", "value" => 1],
                ["label" => "Dispositivi dei Locali ad uso Collettivo", "value" => 2],
                ["label" => "Dispositivi Generali dell'impianto", "value" => 3],

            ])->setFieldsize("medium")->setLabel("Destinazione di utilizzo")->onChange("
            
            
            "),

            //"idUnitaAbitativa"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(UnitaAbitativa::getForSelect("denominazione_completa","id"))->setLabel("Unità Abitativa")->hideIf("destinazioneDispositivo",3),
            "idUnitaAbitativa"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(
                function ($a,$b){

                    if( $idCondominio = Request::getParams("idCondominio") ){
                        $query = UnitaAbitativa::query(true)
                            ->setFields(UnitaAbitativa::getTable().".*")
                            ->join(Edificio::getEntity(),"id","idEdificio")
                            ->where(Edificio::getTable().".idCondominio=".Request::getParams("idCondominio"));
                        return UnitaAbitativa::getForSelect("denominazione_completa","id",$query)();
                    }
                    return UnitaAbitativa::getForSelect("denominazione_completa","id")();
                }

            )->setLabel("Unità Abitativa")->hideIf("destinazioneDispositivo",3),

            //L'ID_Edificio mi serve nel caso di contatore "uso collettivo" o "generale impianto"
            "idEdificio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(
                function ($a,$b){
                    if( $idCondominio = Request::getParams("idCondominio") ){

                        $query = Edificio::query(true)
                            ->where("idCondominio=".Request::getParams("idCondominio"));
                        return Edificio::getForSelect("Condominio_Edificio","id",$query)();
                    }
                    return   Edificio::getForSelect("Condominio_Edificio","id")();
                }

            )->inlist(false)->setLabel("Condominio - Edificio")
            ->hideIf("destinazioneDispositivo",[1,2])
            ,

            "codice"  =>  Field::varchar(100)->editable()->required(true)->setMaxlength(100)->setFieldsize("medium")->setLabel("Codice Contatore")->setPlaceholder("Codice Univoco del Contatore")->required(),
            "modello"  =>  Field::varchar(255)->editable()->setMaxlength(100)->setFieldsize("medium")->setPlaceholder("Modello Contatore")->setHint("Valore Opzionale")->inlist(false),

            //Evito di complicare la vita a tutti con le stanze
            //"idStanza"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Stanza::getForSelect("nomeStanza","id"))->setLabel("Stanza")->setFieldsize("medium"),
            //Mettiamo solo il tipo di stanza
            //"idTipoStanza"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(TipoStanza::getForSelect("nomeTipoStanza","id"))->setLabel("Tipo Stanza")->setFieldsize("small"),

            "ubicazione"    =>  Field::varchar(512)->editable()->setLabel("Ubicazione")->setHint("Nome stanza in cui è posizionato"),

            //Mi servono questi? forse no...
            "idTipoContatore"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(TipoContatore::getForSelect("nomeTipoContatore","id"))->setLabel("Tipologia Contatore")->setFieldsize("medium")->inlist(false),
            "idAggregatore"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(

                function ($a,$b){

                    if( $idCondominio = Request::getParams("idCondominio") ){
                        $query = Aggregatore::query(true)
                            ->where("idCondominio=".Request::getParams("idCondominio"));

                        return Aggregatore::getForSelect("nomeAggregatore","id",$query)();
                    }
                    return Aggregatore::getForSelect("nomeAggregatore","id")();
                }



            )->setLabel("Aggregatore Associato")->setFieldsize("medium")->inlist(false),
            //

            "tipoDispositivo"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Ripartitore", "value" => 1],
                ["label" => "Contatore", "value" => 2],
            ])->setFieldsize("medium")->setLabel("Tipologia misurazione"),


            // INIZIO GRUPPO
            "misure_dispositivo" =>   Field::startGroup(true)->setLabel("Parametri di Lettura")->setHint("Impostazione dati del contatore"),

                "tipologiaMisurazione"	=> Field::varchar(10)->editable()->setTemplate("select")->setTemplateVar([
                    ["value" => "", "label" => "Seleziona..."],
                    ["value" => "ACC", "label" => "Acqua calda (m3)"],
                    ["value" => "ET", "label" => "Energia Termica"],
                    ["value" => "URR", "label" => "Unita' ripartizione radiatore"],
                    ["value" => "OFF", "label" => "Dispositivo Offset"],
                    ["value" => "CC", "label" => "Calorie"],
                    ["value" => "AC", "label" => "Acqua calda"],
                    /*
                    ["value" => "ACC", "label" => "Acqua calda"],
                    ["value" => "ACD", "label" => "Acqua diretta"],
                    ["value" => "ACF", "label" => "Acqua fredda"],
                    ["value" => "OG", "label" => "Avviamenti"],
                    ["value" => "ETC", "label" => "Calorie"],
                    ["value" => "IL1", "label" => "Corrente Linea L1"],
                    ["value" => "IL2", "label" => "Corrente Linea L2"],
                    ["value" => "IL3", "label" => "Corrente Linea L3"],
                    ["value" => "102", "label" => "Corrente Tdhf I1"],
                    ["value" => "103", "label" => "Corrente Tdhf I2"],
                    ["value" => "104", "label" => "Corrente Tdhf I3"],
                    ["value" => "IL", "label" => "Corrente Trifase"],
                    ["value" => "OFF", "label" => "Dispositivo Offset"],
                    ["value" => "EEA", "label" => "Energia Attiva"],
                    ["value" => "EA1", "label" => "Energia Attiva L1"],
                    ["value" => "EA2", "label" => "Energia Attiva L2"],
                    ["value" => "EA3", "label" => "Energia Attiva L3"],
                    ["value" => "EEG", "label" => "Energia Elettrica"],
                    ["value" => "EER", "label" => "Energia Reattiva"],
                    ["value" => "ER1", "label" => "Energia Reattiva L1"],
                    ["value" => "ER2", "label" => "Energia Reattiva L2"],
                    ["value" => "ER3", "label" => "Energia Reattiva L3"],
                    ["value" => "ET", "label" => "Energia Termica"],
                    ["value" => "ETA", "label" => "Energia termica adibito a calcolo di ACS"],
                    ["value" => "ETT", "label" => "Energia Termica Giornaliera Teleriscaldamento"],
                    ["value" => "PF", "label" => "Fattore Potenza"],
                    ["value" => "PF1", "label" => "Fattore Potenza L1"],
                    ["value" => "PF2", "label" => "Fattore Potenza L2"],
                    ["value" => "PF3", "label" => "Fattore Potenza L3"],
                    ["value" => "1", "label" => "Frequenza"],
                    ["value" => "ETF", "label" => "Frigorie"],
                    ["value" => "GAS", "label" => "Gas"],
                    ["value" => "NOR", "label" => "NOREAD"],
                    ["value" => "HR", "label" => "Ore lavoro"],
                    ["value" => "PG", "label" => "Portata Gas"],
                    ["value" => "PI", "label" => "Portata Idrica"],
                    ["value" => "POA", "label" => "Potenza Attiva"],
                    ["value" => "PA1", "label" => "Potenza Attiva L1"],
                    ["value" => "PA2", "label" => "Potenza Attiva L2"],
                    ["value" => "PA3", "label" => "Potenza Attiva L3"],
                    ["value" => "POR", "label" => "Potenza Reattiva"],
                    ["value" => "PR1", "label" => "Potenza Reattiva L1"],
                    ["value" => "PR2", "label" => "Potenza Reattiva L2"],
                    ["value" => "PR3", "label" => "Potenza Reattiva L3"],
                    ["value" => "PT", "label" => "PRESSIONE"],
                    ["value" => "T", "label" => "Temperatura"],
                    ["value" => "L12", "label" => "Tensione Concatenata L1-L2"],
                    ["value" => "L23", "label" => "Tensione Concatenata L2-L3"],
                    ["value" => "L31", "label" => "Tensione Concatenata L3-L1"],
                    ["value" => "VN", "label" => "Tensione di Fase"],
                    ["value" => "V1N", "label" => "Tensione di Fase L1-N"],
                    ["value" => "V2N", "label" => "Tensione di Fase L2-N"],
                    ["value" => "V3N", "label" => "Tensione di Fase L3-N"],
                    ["value" => "TD1", "label" => "Tensione TdhF L1"],
                    ["value" => "TD2", "label" => "Tensione TdhF L2"],
                    ["value" => "TD3", "label" => "Tensione TdhF L3"],
                    ["value" => "VL", "label" => "Tensione Trifase"],
                    ["value" => "U", "label" => "Umidita'"],
                    ["value" => "URR", "label" => "Unita' ripartizione radiatore"],
                    */
                ])->setFieldsize("medium")->setLabel("Tipologia di Misurazione")->inlist(false),


                "campionamento"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                    ["label" => "Secondi", "value" => 1],
                    ["label" => "Minuti", "value" => 60],
                    ["label" => "Ore", "value" => 3600],
                    ["label" => "Giorno", "value" => 86400],
                    ["label" => "Mesi", "value" => 2592000],
                    ["label" => "Anni", "value" => 31536000],
                ])->setFieldsize("small")->inlist(false),
                "frequenzaDiCampionamento"  =>  Field::int()->editable()->setMaxlength(10)->setFieldsize("small")->setPlaceholder("Es: 7")->setLabel("Frequenza di Campionamento")->inlist(false)->required()->setTemplate("int"),
                "stato"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                    ["label" => "Attivo", "value" => 1],
                    ["label" => "In Pausa", "value" => 2],
                    ["label" => "Dismesso", "value" => 3],
                    ["label" => "Sostituito", "value" => 4],
                ])->setFieldsize("small")->inlist(true)->setLabel("Stato"),
                "offSetStart"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("small")->setLabel("Offset")->setHint("Offset di partenza del contatore")->inlist(false),

                "ApplicaKcKq"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Applica Kc/Kq")->setPlaceholder("Applicare Kc/Kq?"),


                "Kc"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("small")->inlist(false),
                "Kq"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("small")->inlist(false),

                "meseDiReset"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                    ["label" => "Gennaio", "value" => 1],
                    ["label" => "Febbraio", "value" => 2],
                    ["label" => "Marzo", "value" => 3],
                    ["label" => "Aprile", "value" => 4],
                    ["label" => "Maggio", "value" => 5],
                    ["label" => "Giugno", "value" => 6],
                    ["label" => "Luglio", "value" => 7],
                    ["label" => "Agosto", "value" => 8],
                    ["label" => "Settembre", "value" => 9],
                    ["label" => "Ottobre", "value" => 10],
                    ["label" => "Novembre", "value" => 11],
                    ["label" => "Dicembre", "value" => 12],
                ])->setFieldsize("small")->inlist(false)->setLabel("Mese di Reset")->setHint("Mese di Reset accettato nella lettura dati"),

                //Per azzeramento o sostituzione?
                "codiceContatoreSostituito"  =>  Field::varchar(100)->editable()->inlist(false)->setMaxlength(100)->setFieldsize("medium")->setLabel("Codice Contatore Sostituito")->setPLaceholder("Inserire un Codice Contatore esistente")->setHint("Se questo contatore ne sostituisce un altro"),

            // FINE GRUPPO
            "misure_dispositivo_fine" =>   Field::endGroup(),


            // INIZIO GRUPPO
            "lettura_dati" =>   Field::startGroup(false)->setLabel("Override Lettura dati CSV")->setHint("Impostazioni personalizzate di lettura dal file di import dell'aggregatore"),

                //Campi che possono andate in override all'aggregatore
                //"idRiga"  =>  Field::varchar(50)->editable()->inlist(false)->setLabel("ID Riga")->setFieldsize("medium"),
                //"riga"  =>  Field::int()->editable()->inlist(false)->setLabel("Riga")->setFieldsize("small")->setTemplate("int"),
                "colonna"  =>  Field::int()->editable()->inlist(false)->setLabel("Colonna")->setFieldsize("small")->setTemplate("int"),
                "colonnaTimestampCampionamento"  =>  Field::int()->editable()->inlist(false)->setLabel("Colonna Timestamp Campionamento")->setFieldsize("small")->setTemplate("int"),
                "coefficienteMoltiplicazione"  =>  Field::float()->editable()->inlist(false)->setLabel("Coefficiente di Moltiplicazione")->setFieldsize("small")->setTemplate("float"),

            // FINE GRUPPO
            "lettura_dati_fine" =>   Field::endGroup(),


            "data_installazione"    =>  Field::date()->editable()->inlist(false),
            "descrizione"   =>  Field::varchar(512)->editable()->inlist(false),

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){
            case "tipoDispositivo":
                switch ($this->tipoDispositivo){
                    case 1: return "Ripartitore"; break;
                    case 2: return "Contatore"; break;
                    default: return "-";
                }
                break;

            case "idUnitaAbitativa":
                if( $this->idUnitaAbitativa ) {
                    $u = UnitaAbitativa::findById($this->idUnitaAbitativa);
                    if ($u) {
                        $f = Edificio::findById($u->idEdificio);
                        if ($f) {
                            $c = Condominio::findById($f->idCondominio);
                            if($c){
                                //$maxcharlab = 10;
                                /*
                                return substr($c->denominazione,0,$maxcharlab).(strlen($c->denominazione)>$maxcharlab?"...":"").
                                    " - ".
                                    substr($f->nomeEdificio,0,$maxcharlab).(strlen($f->nomeEdificio)>$maxcharlab?"...":"").
                                    " - ".
                                    $u->denominazione;
                                */
                                return $u->denominazione;
                            }
                        }
                        return $u->denominazione;
                    }

                }
                break;

            case "idStanza":
                if( $this->idStanza ) {
                    $f = Stanza::findById($this->idStanza);
                    if ($f) {
                        return $f->nomeStanza!="" ? $f->nomeStanza : $f->codice;
                    }
                }
                break;

            case "destinazioneDispositivo":
                switch ($this->destinazioneDispositivo){
                    case 1: return "Unità Abitative"; break;
                    case 2: return "Uso Collettivo"; break;
                    case 3: return "Disp. Generali"; break;
                    default: return "-";
                }
                break;

            case "idEdificio":
                if( $this->idEdificio ) {
                    $f = Edificio::findById($this->idEdificio);
                    if ($f) {
                        $c = Condominio::findById($f->idCondominio);
                        if($c){
                            return $c->denominazione." - ".$f->nomeEdificio;
                        }else{
                            return $f->nomeEdificio;
                        }
                    }
                }
                break;
            case "idTipoStanza":
                if( $this->idTipoStanza ) {
                    $f = TipoStanza::findById($this->idTipoStanza);
                    if ($f) {
                        return $f->nomeTipoStanza;
                    }
                }
                return "-";
                break;

            case "stato":
                switch ($this->destinazioneDispositivo){
                    case 1: return "Attivo"; break;
                    case 2: return "In Pausa"; break;
                    case 3: return "Dismesso"; break;
                    case 4: return "Sostituito"; break;
                    default: return "-";
                }
                break;


        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }


    /**
     * @param $condominio Condominio
     * @return Contatore[]
     */
    static function findByCondominio($condominio){
        return Contatore::query(true)
            ->setFields(Contatore::getTable().".*")
            ->join(UnitaAbitativa::getEntity(),"id","idUnitaAbitativa")
            ->join(Edificio::getEntity(),"id","idEdificio",UnitaAbitativa::getEntity())
            ->join(Condominio::getEntity(),"id","idCondominio",Edificio::getEntity())
            ->where(Condominio::getTable().".id=".$condominio->id)->getAll();
    }
}


