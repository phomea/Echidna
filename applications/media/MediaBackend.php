<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\media;
use applications\banner\BannerApplication;
use applications\media\entities\Media;
use applications\media\MediaApplication;
use core\abstracts\Application;
use core\abstracts\BackendApplication;

class MediaBackend extends BackendApplication {
    static function getApplication()
    {
        return MediaApplication::class;
    }

    static function actionAdd($params = [])
    {

        return["media/templates/add",[]];

    }

}