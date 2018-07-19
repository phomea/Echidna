<?php

namespace applications\pages;
use applications\pages\entities\Pagina;
use applications\slider\entities\Slider;
use core\abstracts\FrontendApplication;
use core\Route;
use core\services\Db;
use core\services\Response;

class PagesFrontend extends FrontendApplication {

    static function declareRoutes()
    {
        return [
            "home"  =>  new Route("home","/",[self::class,"home"]),
            "pagina"  =>  new Route("pagina","/{slug:([0-9a-zA-Z-]*)}",[self::class,"pagina"])
        ];
    }


    static function home(){
        $p = Pagina::findBySlug( "/" );


        $slider = new Slider();
        $slider->findByHook("home");

        return[
            "pagine/home",
            [
                "pagina" =>  $p,
                "slider"    =>  $slider
            ]
        ];
    }
    static function pagina($params=[], $data=null){
        
        $pagina = Pagina::findBySlug($params['slug']);
        if(!$pagina){
            return false;
        }
        $layout = str_replace(".php","",$pagina->layout);
        
        return [
            "pagine/".$layout,
            [
                "content"    =>  $pagina
            ]
        ];
        
        exit;
    }
}