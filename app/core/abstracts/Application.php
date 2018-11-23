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
            RouterService::addRoutesPrefixed($backendApplication::declareRoutes(),"/backend/".static::$name."/",null);
        }
    }


    static function declareRoutes(){
        return [];
    }

    static function install(){
        return static::entities();
    }

    /**
     * @return Model[]
     */
    static function entities(){
        $child = new static;
        $class_info = new \ReflectionClass($child);

        $dir = dirname($class_info->getFileName());
        $dirname = basename($dir);

        $entities = [];

        foreach (glob($dir."/entities/*.php") as $file)
        {

            $name = str_replace(".php","", basename($file) );
            $path = str_replace(basename($file),"",$file);
            $path = "/applications/".$dirname.str_replace($dir,"",$path);
            $class = $path.$name;

            $class = str_replace("/",'\\',$class);

            /**
             * @var $class Model
             */
            if( method_exists($class,"getEntity") ) {
                $entities[] = $class::getEntity();
            }
        }

        return $entities;
    }


}