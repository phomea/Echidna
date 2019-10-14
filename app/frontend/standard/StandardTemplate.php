<?php

namespace frontend\standard;

use core\services\Request;
use core\template\TwigTemplate;

class StandardTemplate extends TwigTemplate {
    function getTemplatesDirectory()
    {
        return __DIR__."/template";
    }
    static function getBaseDirectory()
    {
        return __DIR__;
    }
}