<?php
namespace core;


use core\services\ApplicationsService;
use core\services\Db;
use core\services\EmailService;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\services\RuntimeService;
use core\services\SessionService;

class Bootstrap{
    static function init( $root , $autoloader ){

        
        Environment::init($root,$autoloader);
        RuntimeService::init();

        if(Environment::is(Environment::DEV)) {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }
        EmailService::init();
        RouterService::init();

        ApplicationsService::init();



    }
}