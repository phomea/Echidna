<?php
namespace core;
use core\services\Db;
use core\services\Request;
use core\services\Response;
use core\services\SessionService;

class Environment {
    const DEV   =   "DEV";
    const PROD  =   "PROD";
    static $current = "DEV";

    static $ROOT = "";
    static $CACHE_ROOT = "";
    static $APPLICATION_ROOT = "";
    static $config;

    static $autoloader;

    static function set( $env ){
        self::$current = $env;
    }

    static function is( $env ){
        return self::$current == $env;
    }

    static function init( $root , $autoloader ){
        self::$autoloader = $autoloader;

        self::$config = Config::getFile("environment");

        if( isset(self::$config['mode']) )
            self::$current = self::$config['mode'];

        defined("DS") or define("DS",DIRECTORY_SEPARATOR);
        self::$ROOT = $root;
        self::$CACHE_ROOT = $root.DS."cache";
        self::$APPLICATION_ROOT = $root."/applications";
        Db::init();
        Response::init();



        if( \applications\settings\entities\Setting::exists("dev")){
            self::$current = \applications\settings\entities\Setting::getValueOf("dev") ? self::DEV : self::PROD;
        }

        if(!empty($_GET["forceDev"])){
            self::$current = self::DEV;
        }
        SessionService::init();
        Request::init();


    }
}