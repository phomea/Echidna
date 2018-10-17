<?php
namespace core\abstracts;


use core\Config;

interface ServiceInterface{
    static function getName();
}

abstract class Service implements ServiceInterface{
    public static $config;

    protected static $services = [];

    function __construct(){
        static::getConfigFile();
    }

    static function getConfigFile(){


        static::$config = Config::getFile( static::getName() );


        foreach (static::$config as $key => $value) {
            if( property_exists( get_called_class() ,$key) )
                static::$$key = $value;
        }
    }

    static function init(){
        static::getConfigFile();

    }

    static function setService($k,$v){
        self::$services[$k] = $v;
    }
    static function getService($k){



        if( array_key_exists($k,self::$services) ){

            if( self::$services[$k] ==  null ){
                self::setService($k,new $k());

            }

            return self::$services[$k];
        }
        return null;
    }
    static function addService($k,$v){
        define(ucfirst($k),$v);

        //array_push(self::$services,new $v());
        self::$services[$v] = null;
        $v::init();
    }

}
