<?php
namespace applications\users;


use applications\banner\entities\Banner;
use applications\banner\BannerBackend;
use applications\pages\entities\Pagina;
use applications\users\entities\User;
use core\abstracts\Application;
use core\Config;
use core\Model;
use core\services\Response;
use core\services\RouterService;

class UsersApplication extends Application {


    static function getFrontendApplication()
    {
        return null;
    }

    static function getBackendApplication()
    {

        return UsersBackend::class;
    }

    static function getEntityClass()
    {
        return \applications\login\entities\User::class;
    }


    static function install()
    {
        return [
            self::getEntityClass()
        ];
    }


}