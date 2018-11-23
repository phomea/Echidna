<?php
namespace applications\helloworld;


use applications\helloworld\entities\HelloWorld;
use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\abstracts\FrontendApplication;
use core\Model;
use core\services\Response;

class HelloWorldApplication extends Application {
    static function getFrontendApplication()
    {
        return null;
    }


    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return HelloWorldBackend::class;
    }

    static function getEntityClass()
    {
        return HelloWorld::class;
    }

}