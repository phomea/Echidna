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
        Response::init();
        Db::init();
        SessionService::init();
        Request::init();



        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
        EmailService::init();
        RouterService::init();
        ApplicationsService::init();



    }
}