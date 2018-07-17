<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\banner;
use applications\banner\BannerApplication;
use core\abstracts\Application;

class BannerBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return BannerApplication::class;
    }

}