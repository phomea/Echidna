<?php
namespace applications\main;


use applications\main\entities\Widget;
use applications\meta\entities\Meta;
use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\abstracts\FrontendApplication;
use core\Model;
use core\services\Response;

class MainApplication extends Application {


    static function getFrontendApplication()
    {
        return null;
    }


    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return MainBackend::class;
    }

    static function getEntityClass()
    {
        return Widget::class;
    }

}