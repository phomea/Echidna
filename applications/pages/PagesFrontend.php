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
            "home"  =>  new Route("home","/",[self::class,"home"])
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
}