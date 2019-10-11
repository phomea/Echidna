<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Provincia;
use applications\ecommerce\entities\Spedizione;
use applications\ecommerce\entities\SpedizionePrezzo;
use applications\ecommerce\entities\Zona;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Route;
use core\services\Response;
use core\services\RouterService;

class Spedizioni extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function getEntityClass()
    {
        return Spedizione::class;
    }


    static function declareRoutes()
    {
        $r[Spedizione::class.".add"]= (new Route("","aggiungi",[self::class,"actionAdd"]));


        $r['ecommerce.spedizioni.home'] =   (new Route("","",[self::class,"home"]));



         $r = array_merge($r,
                 Zona::generateRoutes(\applications\ecommerce\Zona::class,"zona/"),
                 Provincia::generateRoutes(Provincie::class,"provincia/"),
                 Spedizione::generateRoutes(self::class,""),
                 SpedizionePrezzo::generateRoutes(SpedizioniPrezzi::class,"prezzi/")
         );



        return $r;
    }


    static function ordini(){

        return [
            "ecommerce/templates/ordini",[]
        ];
    }

    static function home(){
        $provincie = Provincia::query()->getAll();
        $spedizioni = Spedizione::query()->getAll();
        $zone = Zona::query()->getAll();
        return [
            "ecommerce/templates/spedizioni.home",[
                "provincie" =>  Response::getTemplateToUse("list",[
                    "data"=>$provincie,"title"=>"Provincie",
                    "entity"    =>  Provincia::class
                ],"empty.twig")->render(),

                "spedizioni" =>  Response::getTemplateToUse("list",[
                    "data"=>$spedizioni,"title"=>"Spedizioni",
                    "entity"    =>  Spedizione::class
                ],"empty.twig")->render(),
                "zone" =>  Response::getTemplateToUse("list",[
                    "data"=>$zone,"title"=>"Zone",
                    "entity"    =>  Zona::class
                ],"empty.twig")->render()
            ]
        ];
        exit;
    }

    static function actionAdd($params = []){
        $entity = static::getEntityClass();
        $e = new $entity($params);
        $fields = static::generateFields($entity, $e );

        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $e ,
                "fields"    =>  $fields
            ]
        ];
    }
    static function actionMod($params = [])
    {
        $d = parent::actionMod($params); // TODO: Change the autogenerated stub


        $prezzi = SpedizionePrezzo::findById_ecommerce_spedizione($d[1]['data']->id);

        return [
            "tabs" ,[
                "tabs"  =>[
                    "proprieta"=>[
                        "label"     =>  "Proprietà",
                        "content"   =>  Response::getTemplateToUse($d[0],
                            $d[1]
                            ,"empty.twig")->render()
                    ],
                    "prezzi"=>[
                        "label"     =>  "Prezzi",
                        "content"   =>  Response::getTemplateToUse(
                            "list",
                            [
                                "data"      => $prezzi,
                                "entity"    => SpedizionePrezzo::class,
                                "routeParams" => [
                                    "id_ecommerce_spedizione"   =>  $d[1]['data']->id
                                ]
                            ],
                            "empty.twig")->render()
                    ]
                ]
            ]
        ];
    }


}