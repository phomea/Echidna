<?php
namespace core;


use core\services\ApplicationsService;
use core\services\Db;
use core\services\EmailService;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;

class Bootstrap{
    static function init( $root ){


        Environment::init($root);


        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();


        ApplicationsService::init();
        RouterService::init();
        EmailService::init();


    }
}