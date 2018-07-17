<?php
namespace applications\meta;


use applications\meta\entities\Meta;
use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\abstracts\FrontendApplication;
use core\Model;
use core\services\Response;

class MetaApplication extends Application {
    static function getFrontendApplication()
    {
        return null;
    }


    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return MetaBackend::class;
    }

    static function getEntityClass()
    {
        return Meta::class;
    }

}