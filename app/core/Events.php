<?php
namespace core;


class Events{

    const USER_CHECK_PERMISSION = "user.checkpermission";

    const QUERY_GETONE = "query.getone";
    const QUERY_GETALL = "query.getall";
    const QUERY_COUNT = "query.count";
    const QUERY_PARSE = "query.parse";

    const ENTITY_GETINSTANCE = "entity.getinstance";

    const BACKEND_ACTION_MOD_RETURN = "backend.action.mod.return";


    const ROUTER_PARSEQUERY_BEFORE = "router.parsequery.before";
    const ROUTER_GETROUTE = "router.getroute";

    const ROUTER_BEFORE_DISPATCH = "router.dispatch.before";
    const ROUTER_AFTER_DISPATCH = "router.dispatch.after";

    const APPLICATIONS_INIT_BEFORE =  "applications.init.before";
    const APPLICATIONS_INIT_FINISH =  "applications.init.finish";
    static $events = [];



    static function _internalAdd($name,$callable){
        if(!isset(self::$events[$name]) ){
            self::$events[$name] = [];
        }
        self::$events[$name][] = $callable;
    }

    static function add($name,$callable){
        if( is_string($name)){
            self::_internalAdd($name,$callable);
        }
        if(is_array($name)){
            foreach ($name as $n){
                self::_internalAdd($n,$callable);
            }
        }

    }

    static function exists($name){
        return isset(self::$events[$name]) && !empty(self::$events[$name]);
    }

   static function dispatch($name,...$params){


        if( self::exists($name) ){

            $response = $params[0];



            foreach (self::$events[$name]  as $callable){
                $params[0] = $response;
                $response  = call_user_func($callable,...$params);

            }


            return $response;

        }
        return $params;
   }

}