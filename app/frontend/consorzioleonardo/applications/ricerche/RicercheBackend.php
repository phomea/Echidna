<?php

namespace frontend\consorzioleonardo\applications\ricerche;


use core\abstracts\BackendApplication;
use core\Route;
use frontend\consorzioleonardo\applications\ricerche\entities\Ricerca;
use frontend\consorzioleonardo\applications\ricerche\templates\ricerche\RicercaTemplate;


class RicercheBackend extends BackendApplication{
    static function getApplication()
    {
        return RicercheApplication::class;
    }

    static function declareRoutes()
    {
        return array_merge(parent::declareRoutes(),[
            "backend.ricerche.home" =>  new Route("","home",[self::class,"_ricerche"]),
            "backend.ricerche.do" =>  new Route("","do/{id:([0-9]*)}",[self::class,"_doRicerca"])
        ]);
    }

    static function _ricerche(){

        $ricerche = Ricerca::query()->getAll();
        return [
            "ricerche/templates/home",[
                "ricerche"  =>  $ricerche
            ]
        ];
    }

    static function _chiediCampi( $askfor ){


        return [
            "ricerche/templates/ricerca.campi",array_merge([
                "askfor"    =>  $askfor

            ],$_GET)
        ];
    }




    static function _doRicerca($params){



        $ricerca = Ricerca::findById($params['id']);

        if($ricerca->askfor != "" ){
            $mancanocampi = false;
            foreach (explode(";",$ricerca->askfor) as $key=>$value){



                if(!key_exists($value,$params)) $mancanocampi = true;
            }
            if($mancanocampi){
                return self::_chiediCampi( explode(";",$ricerca->askfor ));
            }
        }
        $risultati = $ricerca->doSearch();

        /**
         * @var $template RicercaTemplate
         * @var $templateClass RicercaTemplate
         */
        $templateClass = "frontend\\consorzioleonardo\\applications\\ricerche\\templates\\ricerche\\".$ricerca->template;
        $template =  new $templateClass($ricerca,$risultati);

        return $template->render();



    }


}