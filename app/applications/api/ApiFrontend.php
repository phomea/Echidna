<?php

namespace applications\api;
use applications\api\entities\Api;
use applications\api\entities\ApiToken;
use applications\login\entities\User;
use applications\pages\entities\Pagina;
use applications\slider\entities\Slider;
use core\abstracts\FrontendApplication;
use core\Route;
use core\services\Db;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;

class ApiFrontend extends FrontendApplication {

    static function declareRoutes()
    {
        return [
            "api.wrapper"  =>  new Route("home","/api/{apiquery:(.*)}",[self::class,"apiWrapper"]),
        ];
    }


    static function apiWrapper( $params = [] ){
        $token = false;
        if( isset(Request::$headers['Token']) ){
            $token = Request::$headers['Token'];
        }



        $listaapi = Api::query()->getAll();

        foreach ($listaapi as $key=>$value){
            if($value->autenticazione == "token"){
                if( !$token ){
                    return static::nonAutorizzato();
                }
                $token = ApiToken::query()->where('token="'.$token.'"')->getOne();
                if( !$token ){
                    return static::nonAutorizzato();
                }
                if( !User::findById($token->user_id) ){
                    return static::nonAutorizzato();
                }
            }
            $r = RouterService::parseQuery("/".$params['apiquery'],$value->metodo." /".$value->url);
            if( $r!== false){
                if($value->tiporisposta == "array") {
                    $risultati = Db::$connection->fetchAll($value->query, $r);
                }else{
                    $risultati = Db::$connection->fetchOne($value->query, $r);
                }
                echo json_encode($risultati);
                exit;
            }

        }


        exit;
    }


    static function nonAutorizzato(){
        echo "non autorizzato";
        exit;
    }

}