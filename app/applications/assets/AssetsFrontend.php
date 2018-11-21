<?php

namespace applications\assets;
use applications\pages\entities\Pagina;
use core\abstracts\FrontendApplication;
use core\Environment;
use core\Route;
use core\services\Response;


class AssetsFrontend extends FrontendApplication {

    static function declareRoutes()
    {
        return [
            "assets/css/{file:(.*)}"  =>  new Route("home","/assets/css/{file:(.*)}",[self::class,"css"]),
            "assets/js/{file:(.*)}"  =>  new Route("home","/assets/js/{file:(.*)}",[self::class,"js"]),
            "assets/img/{file:(.*)}"  =>  new Route("home","/assets/img/{file:(.*)}",[self::class,"img"])
        ];
    }


    static function css( $params ){

        $t = Response::getTemplateToUse();
        $base = $t::getBaseDirectory();
        $file = $params['file'];
        header('Content-type: text/css');

        \Less_Autoloader::register();


        $file = str_replace(".css",".less",$file);

        $parser = new \Less_Parser();
        $parser->parseFile($base."/assets/css/".$file);
        $css = $parser->getCss();
        echo $css;

        exit;
    }

    static function js( $params ){




        $t = Response::getTemplateToUse();
        $base = $t::getBaseDirectory();
        $file = $params['file'];
        header('Content-type: application/javascript');


        include $base."/assets/js/".$file;


        exit;
    }

    static function img( $params ){

        $t = Response::getTemplateToUse();
        $base = basename($t::getBaseDirectory());
        $file = $params['file'];
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: /frontend/".$base."/assets/img/".$file);
        exit;
    }
}