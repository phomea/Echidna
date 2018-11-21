<?php
namespace applications\assets;




use core\abstracts\Application;
use core\Environment;
use core\services\Response;

class AssetsApplication extends Application {


    static function declareRoutes()
    {
        // TODO: Implement declareRoutes() method.
        return [];
    }

    static function getFrontendApplication()
    {
        // TODO: Implement getFrontendApplication() method.

        return AssetsFrontend::class;
    }

    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
    }

    static function getEntityClass()
    {

    }


}