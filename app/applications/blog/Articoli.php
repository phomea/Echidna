<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\blog;
use applications\banner\BannerApplication;
use applications\blog\BlogApplication;
use applications\blog\entities\Articolo;
use core\abstracts\Application;

class Articoli extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return BlogApplication::class;
    }

    static function getEntityClass()
    {
        return Articolo::class;
    }


}