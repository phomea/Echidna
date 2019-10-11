<?php 
namespace applications\redirects;

use applications\redirects\entities\Redirect;
use core\abstracts\BackendApplication;

class RedirectsBackend extends BackendApplication{
    static function declareRoutes()
    {
       
        return parent::declareRoutes();
    }
    static function getApplication()
    {
        return RedirectsApplication::class;
    }

}