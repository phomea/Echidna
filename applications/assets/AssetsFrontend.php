<?php

namespace applications\assets;
use applications\pages\entities\Pagina;
use core\abstracts\FrontendApplication;
use core\Environment;
use core\Route;

class AssetsFrontend extends FrontendApplication {

    static function declareRoutes()
    {
        return [
            "assets/css/{file:(.*)}"  =>  new Route("home","/assets/css/{file:(.*)}",[self::class,"css"])
        ];
    }


    static function css( $params ){
        $file = $params['file'];
        header('Content-type: text/css');

        \Less_Autoloader::register();


        $file = str_replace(".css",".less",$file);

        $parser = new \Less_Parser();
        $parser->parseFile(Environment::$ROOT."/assets/css/".$file);
        $css = $parser->getCss();
        echo $css;

        exit;
    }
}