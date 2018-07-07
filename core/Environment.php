<?php
namespace core;
use core\services\Request;
use core\services\Response;
use core\services\SessionService;

class Environment {
    const DEV   =   "DEV";
    const PROD  =   "PROD";
    static $current = "DEV";

    static $ROOT = "";
    static $CACHE_ROOT = "";

    static $config;

    static function set( $env ){
        self::$current = $env;
    }

    static function is( $env ){
        return self::$current == $env;
    }

    static function init( $root ){
        self::$config = Config::getFile("environment");

        if( isset(self::$config['mode']) )
            self::$current = self::$config['mode'];

        defined("DS") or define("DS",DIRECTORY_SEPARATOR);
        self::$ROOT = $root;
        self::$CACHE_ROOT = $root.DS."cache";

        SessionService::init();
        Request::init();
        Response::init();

    }
}