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
            "api.wrapper.get"  =>  new Route("home","/api/{apiquery:(.*)}",[self::class,"apiWrapper"]),
            "api.wrapper.post"  =>  (new Route("home","/api/{apiquery:(.*)}",[self::class,"apiWrapper"]))->method(Route::METHOD_POST),
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
                if(Request::getMethod() == Route::METHOD_GET){
                    echo self::respondGet($value,$r);
                    exit;
                }
                if(Request::getMethod() == Route::METHOD_POST){
                    echo self::respondPost($value,$r,Request::getPost());
                    exit;
                }

                if(Request::getMethod() == Route::METHOD_PUT){
                    echo self::respondPost($value,$r,Request::getPost());
                    exit;
                }
            }

        }


        exit;
    }

    static function respondGet($api,$get,$post =[]){
        if($value->tiporisposta == "array") {
            $risultati = Db::$connection->fetchAll($api->query, $get);
        }else{
            $risultati = Db::$connection->fetchOne($api->query, $get);
        }
        return json_encode($risultati);
    }

    static function respondPut($api,$get,$post =[]){
        echo "put";
        exit;
    }
    static function respondPost($api,$get,$post =[]){


        if( $api->entity_method == "save"){
            $dati = array_merge($get,$post);
            $e = new $api->entity($dati);
            $e->save();
            echo json_encode($e);
        }
        exit;
        if($value->tiporisposta == "array") {
            $risultati = Db::$connection->fetchAll($api->query, $get);
        }else{
            $risultati = Db::$connection->fetchOne($api->query, $get);
        }
        return json_encode($risultati);
    }


    static function nonAutorizzato(){
        echo "non autorizzato";
        exit;
    }

}