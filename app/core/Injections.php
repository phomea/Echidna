<?php
namespace core;


class Injections{

    static $schema = [];

    static $methods = [];



    static function addToSchema($entity,$key,$value){
        if( !isset(self::$schema[$entity])){
            self::$schema[$entity] = [];
        }
        self::$schema[$entity][$key] = $value;
    }

    static function getSchema( $entity ){


        if(!empty(self::$schema[$entity])){
            return self::$schema[$entity];
        }
        return [];
    }


    static function addMethod($entity,$method,$callable){
        if( !isset(self::$methods[$entity])){
            self::$methods[$entity] = [];
        }
        self::$methods[$entity][$method] = $callable;
    }

    static function methodExists($entity,$method){


        return !empty(self::$methods[$entity]) && is_callable(self::$methods[$entity][$method]) ;
    }

    static function executeMethod($entity,$method,$params){
        return call_user_func_array(self::$methods[$entity][$method],$params);
    }
}