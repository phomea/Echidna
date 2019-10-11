<?php

namespace core\services;

use core\abstracts\Service;
use core\Environment;
use core\Events; 
class RuntimeService extends Service{
    
    static function getName()
    {
        return "runtime";
    }
    static function init()
    {
        parent::init();
         
        if( !file_exists(Environment::$ROOT."/runtime")) mkdir(Environment::$ROOT."/runtime");

        Events::add(Events::APPLICATIONS_INIT_BEFORE,function(){
            $runtimeRoot = Environment::$ROOT."/runtime";
            if(Environment::is(Environment::DEV)){
             
            }else{
                RouterService::$routes = include $runtimeRoot."/routes.php";
            }
        });
        Events::add(Events::APPLICATIONS_INIT_FINISH,function(){
            $runtimeRoot = Environment::$ROOT."/runtime";
            if(Environment::is(Environment::DEV)){
                $routes = RouterService::$routes;
                $runtimeRoot = Environment::$ROOT."/runtime";
    
                $r = var_export($routes,true);
                file_put_contents($runtimeRoot."/routes.php",'<?php return '.$r.";");
            }
           
    
        });
    }

}