<?php

namespace applications\pages;

use applications\main\widgets\WidgetCard;
use applications\meta\entities\Meta;
use applications\meta\MetaBackend;
use applications\pages\entities\Contenuto;
use applications\pages\entities\Pagina;
use applications\pages\widgets\WidgetAggiungiNuovaPagina;
use applications\pages\widgets\WidgetPageNumber;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Cache;
use core\Config;
use core\Environment;
use core\Route;
use core\services\Db;
use core\services\Response;

class ContenutiBackend extends BackendApplication{


    static function init()
    {
        parent::init(); // TODO: Change the autogenerated stub


    }

    static function declareRoutes()
    {
        return array_merge(
            [
              "contenuti.riodina"   =>  (new Route("","riordina",[self::class,"riordina"]))->method(Route::METHOD_POST)
            ],
            parent::declareRoutes(),[
            "contenuti.infotipo" => new Route("","tipo/{tipo:(.*)}",[self::class,"getInfoTipo"])
        ]);
    }

    static function riordina( $params = [], $data = []){


        foreach ($data as $key=>$value){
            $c = new Contenuto([
                "id"=>$value
            ]);
            
            $c->ordine = $key;
            $c->save();
        }

        exit;
    }


    static function getEntityClass()
     {
         return Contenuto::class;
     }

    static function getApplication()
    {
        return PagesApplication::class;
    }

    static function getInfoTipo($params = []){

        $allinfo = Config::getFile("contenuti");

        $tipo = $params["tipo"];

        $infotipo = $allinfo[$tipo];
        return ["",[
            "data"=>$infotipo
            ]
        ];
        exit;
    }



}