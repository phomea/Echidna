<?php

namespace core\abstracts;

use applications\login\LoginApplication;
use core\Model;
use core\services\RouterService;

abstract class Application{
    static $name;

    /**
     * @return FrontendApplication
     */
    abstract static function getFrontendApplication();

    /**
     * @return BackendApplication
     */
    abstract static function getBackendApplication();

    /**
     * @return Model
     */
    abstract static function getEntityClass();


    static function init( $n ){

        static::$name = $n;


        RouterService::addRoutes( static::declareRoutes() );


        $frontendApplication = static::getFrontendApplication();
        if(!empty($frontendApplication)) {
            $frontendApplication::$application = static::class;
            RouterService::addRoutes($frontendApplication::declareRoutes());
        }

        $backendApplication = static::getBackendApplication();
        if(!empty($backendApplication )) {

            //[LoginApplication::class,"loginBackendFilter"]
            RouterService::addRoutesPrefixed($backendApplication::declareRoutes(),"/backend/".static::$name."/");
        }
    }


    static function declareRoutes(){
        return [];
    }

    static function install(){
        return [];
    }

}