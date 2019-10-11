<?php

namespace applications\assets;
use applications\pages\entities\Pagina;
use claviska\SimpleImage;
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
            "assets/img/{file:(.*)}"  =>  new Route("home","/assets/img/{file:(.*)}",[self::class,"img"]),
            "mediaresize"   =>  new Route("mediaresize","/resize/{filters:(.*)}/media/{file:(.*)}",[self::class,"mediaresize"])
        ];
    }

    static function mediaresize($p){

        $filters = [];

        $f = $p['filters'];
        $f = explode("-",$p['filters']);
        foreach ( $f as $item) {
            $e = explode("=",$item);
            $filters[$e[0]] = $e[1];
        }

        $width = isset($filters['w']) ? $filters['w'] : null;
        $height = isset($filters['h']) ? $filters['h'] : null;

        $image = new SimpleImage();
        $image->fromFile(Environment::$ROOT."/media/".$p['file']);

        if( !empty($width) && !empty($height) ) {
            $image->thumbnail($width, $height);
        }else {
            //$image->bestFit($width, $height);
            $image->resize($width, $height);
        }

        $quality = isset($filters['q']) ? $filters['q'] : 75;




        @mkdir(dirname(Environment::$ROOT."/".$p['query']),0777,true);

        $image->toFile(Environment::$ROOT."/".$p['query'],null,$quality);
        $image->toScreen(null,$quality);
        exit;
    }


    static function css( $params ){


        $t = Response::getTemplateToUse();
        $base = $t::getBaseDirectory();
        $file = $params['file'];
        $fileCss = $file;
        header('Content-type: text/css');

        \Less_Autoloader::register();



        $file = str_replace(".css",".less",$file);

        $parser = new \Less_Parser();
        $parser->parseFile($base."/assets/css/".$file);
        $css = $parser->getCss();
        file_put_contents($base."/assets/css/".$fileCss,$css);

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