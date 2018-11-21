<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\users;
use applications\banner\BannerApplication;
use core\abstracts\Application;

class UsersBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return UsersApplication::class;
    }




}