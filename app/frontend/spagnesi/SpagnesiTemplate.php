<?php

namespace frontend\spagnesi;

use core\template\TwigTemplate;

class SpagnesiTemplate extends TwigTemplate {
    function getTemplatesDirectory()
    {
        return __DIR__."/template";
    }

    static function getBaseDirectory()
    {
        return __DIR__;
    }


}