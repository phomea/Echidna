<?php
namespace applications\anagraficaimmobili\applicazioni;

use applications\anagraficaimmobili\AnagraficaImmobiliApplication;
use applications\anagraficaimmobili\entities\Aggregatore;
use applications\anagraficaimmobili\entities\Generatore;
use applications\anagraficaimmobili\entities\Vettore;
use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\Contatore;
use applications\anagraficaimmobili\entities\Edificio;
use applications\anagraficaimmobili\entities\Fornitore;
use applications\anagraficaimmobili\entities\UnitaAbitativa;
use applications\reports\applicazioni\BolletteBackend;
use backend\BackendTemplate;
use core\abstracts\BackendApplication;
use core\Query;
use core\Route;
use core\services\Response;
use core\services\RouterService;

class CondominiBackend extends BackendApplication{


    static function getEntityClass()
    {
        return Condominio::class;
    }

    static function getApplication()
    {
        return AnagraficaImmobiliApplication::class;
    }

   static function actionAdd($params = [])
   {
       $add = parent::actionMod($params); // TODO: Change the autogenerated stub
       $add[1]['title'] = "Inserisci nuovo Condominio";
       return $add;
   }

   static function declareRoutes()
   {
       return array_merge(
           [
               "condominio.mesedireset.imposta"  =>  (new Route("",self::getEntityClass()::getModLink()."/impostamesedireset",[static::class,"actionImpostaMeseDiReset"]))->method(Route::METHOD_POST)
           ],
           parent::declareRoutes()
           );
   }

   static function actionImpostaMeseDiReset($params,$post){
        $condominio = Condominio::findById($params['id']);


        $condominio->buildProperties($post);
        $condominio->save();

        $contatori = Contatore::findByCondominio($condominio);

        foreach ($contatori as $value){
            $value->meseDiReset = $post['mese'];
            $value->save();
        }

        return Response::redirect(RouterService::getRoute(Condominio::getEntity().".mod")->build([
            "id"    =>  $condominio->id,
            "tab"   =>  8,
            "message"   =>  "Mese di reset cambiato per il condominio ed i contatori associati"
        ]));

   }
    static function actionMod($params = [])
    {



        $mod = parent::actionMod($params); // TODO: Change the autogenerated stub
        $condominio = $mod[1]["data"];
        $idCondominio = $mod[1]["data"]->id;
        $mod[1]["title"] = "Anagrafica Condominio: ".$mod[1]["data"]->denominazione;


        //Aggregatori
        $queryAggregatori = Aggregatore::query(false);
        $queryAggregatori->where("idCondominio=".$idCondominio);

        $listaAggregatori = AggregatoriBackend::actionFilteredList(["custom_query"=>$queryAggregatori]);
        $listaAggregatori[1]['routeParams']=[
            "idCondominio"  =>  $idCondominio
        ];
        $listaAggregatori[1]['title'] = "Lista Aggregatori del Condominio: ".$mod[1]["data"]->denominazione;






        //Vettori
        $queryVettori = Vettore::query(true)->setFields(Vettore::getTable().".*")
            ->join(Generatore::getEntity(),"id","idGeneratore")
            ->where(Generatore::getTable().".idCondominio=".$idCondominio);






        $listaVettori = VettoriBackend::actionFilteredList(["custom_query"=>$queryVettori]);
        $listaVettori[1]['routeParams']=[
            "idCondominio"  =>  $idCondominio
        ];
        $listaVettori[1]['title'] = "Lista Vettori Energetici del condominio: ".$mod[1]["data"]->denominazione;


        $tabEdifici = EdificiBackend::actionComplessList([
            "params" => "where/idCondominio=".$idCondominio,
            "routeParams" =>
                [
                    "idCondominio"  =>  $idCondominio
                ]
        ]);



        // NUOVI
        $paramsInterni = "where/condominio.id=$idCondominio/join/edificio on edificio.id=unitaabitativa.idEdificio/condominio on condominio.id=edificio.idCondominio";
        $tabUnita = UnitaAbitativeBackend::actionComplessList([
            "params"    => $paramsInterni,
            "routeParams" =>
            [
                "idCondominio"  =>  $idCondominio
            ]
        ]);
        $tabContatoriUnitaAbitative = ContatoriBackend::actionComplessList([
            "params"    => "join/unitaabitativa on unitaabitativa.id=contatore.idUnitaAbitativa/".$paramsInterni
        ]);


        $tabContatoriUsoCollettivo = ContatoriBackend::actionComplessList([
            "params"    => "join/unitaabitativa on unitaabitativa.id=contatore.idUnitaAbitativa/".$paramsInterni."/where/contatore.destinazioneDispositivo = 2"
        ]);

        $paramsCustom = "where/condominio.id=$idCondominio/join/edificio on edificio.id=contatore.idEdificio/condominio on condominio.id=edificio.idCondominio";
        $tabContatoriGenerali  = ContatoriBackend::actionComplessList([
            "params"    => $paramsCustom."/where/contatore.destinazioneDispositivo = 3"
        ]);


        $tabGeneratori  = GeneratoriBackend::actionComplessList([
            "params"    => "where/idCondominio=$idCondominio",
            "title" =>  "Lista Generatori del condominio: ".$mod[1]["data"]->denominazione,
            "routeParams" =>
                [
                    "idCondominio"  =>  $idCondominio
                ]
        ]);

        $tabVettori  = VettoriBackend::actionComplessList([
            "params"    => "join/generatore on generatore.id=vettore.idGeneratore/where/generatore.idCondominio=$idCondominio",

            "routeParams" =>
                [
                    "idCondominio"  =>  $idCondominio
                ]
        ]);


        $idAggregatori = [];
        foreach($listaAggregatori[1]['data'] as $value){
            $idAggregatori[] = $value->id;
        }

        if(!empty($idAggregatori)){
            $tabLetture = LettureAggregateBackend::actionComplessList([
                "params"    =>  "where/letturaaggregata.idAggregatore IN (".implode(",",$idAggregatori).")",
                "routeParams" =>
                    [
                        "idCondominio"  =>  $idCondominio
                    ]
            ]);

        }






        $tabBollette  = BolletteBackend::actionComplessList([
            "params"    => "join/condominio on condominio.id=bolletta.idCondominio/where/condominio.id=$idCondominio",

            "routeParams" =>
                [
                    "idCondominio"  =>  $idCondominio
                ]
        ]);







        $totaleNumeroContatori = count($tabContatoriUnitaAbitative[1]['data']) + count($tabContatoriUsoCollettivo[1]['data']) +count($tabContatoriGenerali[1]['data']);

        return[
            "tabs",[
                "tabs"=>[
                    /*[
                        "label" =>  "Informazioni condominio",
                        "content"   =>  Response::getTemplateToUse($mod[0],$mod[1],"empty.twig")->render()
                    ],*/
                    BackendTemplate::renderTemplateSingleTab("Informazioni condominio",$mod[0],$mod[1]),

                    /*[
                        "label" =>  "Edifici",
                        "content"   =>  Response::getTemplateToUse($listaEdifici[0],$listaEdifici[1],"empty.twig")->render()
                    ],*/
                    BackendTemplate::renderTemplateSingleTab("Edifici",$tabEdifici[0],$tabEdifici[1]),

                    BackendTemplate::renderTemplateSingleTab("Unità abitative",$tabUnita[0], $tabUnita[1]),

                    [
                        "label" =>  "Contatori",
                        "content"   => BackendTemplate::mergeTemplates([
                                Response::getTemplateToUse("parts/list-header",[
                                    "title" =>  "Ci sono ".$totaleNumeroContatori." contatori nel condominio",
                                    "entity"    =>  Contatore::getEntity(),
                                    "routeParams"   =>  [
                                        "idCondominio"  =>  $idCondominio
                                    ]
                                ],"empty.twig")->render(),

                                BackendTemplate::renderTemplateGroup("Contatori delle Unità Abitative (".count($tabContatoriUnitaAbitative[1]['data']).")","contatoriunita",  BackendTemplate::renderTemplate($tabContatoriUnitaAbitative[0],array_merge(
                                    $tabContatoriUnitaAbitative[1],
                                    [
                                        "hideHeader"=>true,
                                        "routeParams" =>
                                            [
                                                "idCondominio"  =>  $idCondominio
                                            ]
                                    ])),true)/*[
                                    "data"  =>  $contatoriUnitaAbitative,
                                    "hideHeader"=>true]),true ),*/,


                                BackendTemplate::renderTemplateGroup("Contatori Locali ad Uso Collettivo (".count($tabContatoriUsoCollettivo[1]['data']).")","contatoriusocollettivo",  BackendTemplate::renderTemplate($tabContatoriUsoCollettivo[0],array_merge(
                                    $tabContatoriUsoCollettivo[1],
                                    [
                                        "hideHeader"=>true,
                                        "routeParams" =>
                                            [
                                                "idCondominio"  =>  $idCondominio
                                            ]
                                    ]))),
                                BackendTemplate::renderTemplateGroup("Contatori Generali (".count($tabContatoriGenerali[1]['data']).")","contatorigenerali",  BackendTemplate::renderTemplate($tabContatoriGenerali[0],array_merge(
                                    $tabContatoriGenerali[1],
                                    [
                                        "hideHeader"=>true,
                                        "routeParams" =>
                                            [
                                                "idCondominio"  =>  $idCondominio
                                            ]
                                    ]))),
                                //BackendTemplate::renderTemplateGroup("Contatori Locali ad Uso Collettivo","contatoriusocollettivo",  BackendTemplate::renderTemplate("list",["data"  =>  $contatoriUsoCollettivo,"hideHeader"=>true]) ),
                               // BackendTemplate::renderTemplateGroup("Contatori Generali","contatorigenerali",  BackendTemplate::renderTemplate("list",["data"  =>  $contatoriGenerali,"hideHeader"=>true]) )
                            ])
                    ],
                    [
                        "label" =>  "Aggregatori",
                        "content"   =>  Response::getTemplateToUse($listaAggregatori[0],$listaAggregatori[1],"empty.twig")->render()
                    ],
                    [
                        "label" =>  "Generatori",
                        "content"   =>  Response::getTemplateToUse($tabGeneratori[0],$tabGeneratori[1],"empty.twig")->render()
                    ],
                    [
                        "label" =>  "Vettori",
                        "content"   =>  Response::getTemplateToUse($tabVettori[0],$tabVettori[1],"empty.twig")->render()
                    ],
                    BackendTemplate::renderTemplateSingleTab("Letture",$tabLetture[0], $tabLetture[1]),

                    BackendTemplate::renderTemplateSingleTab("Bollette",$tabBollette[0], $tabBollette[1]),

                    BackendTemplate::renderTemplateSingleTab("Utility","anagraficaimmobili/templates/utility", [
                        "condominio"    =>  $condominio,
                        "mesi"  =>  [
                            "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"
                        ]
                    ]),

                ],
                "title"=>"Modifica Condominio: ".$mod[1]["data"]->denominazione,
                "breadcrumbs"=>$mod[1]["breadcrumbs"]
            ]
        ];
    }

    public static function actionList($params = [])
    {
        $add = parent::actionList($params); // TODO: Change the autogenerated stub
        $add[1]['title'] = "Elenco dei Condomini";
        return $add;
    }


    static function actionInsert($params = [], $data = null)
    {
        $e = parent::actionInsert($params, $data); // TODO: Change the autogenerated stub


        $condominio = $e[1]['data']["data"];

        $edificio = new Edificio([
            "idCondominio"  =>  $condominio->id,
            "nomeEdificio"  =>  "1", //$condominio->denominazione." - Primo edificio",
            "indirizzo" =>  $condominio->indirizzo,
            "codice"    =>  $condominio->codice."-1"
        ]);
        $edificio->save();

        return $e;
    }
}