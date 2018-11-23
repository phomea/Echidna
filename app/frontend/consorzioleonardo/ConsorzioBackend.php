<?php

namespace frontend\consorzioleonardo;

use core\Environment;
use core\template\TwigTemplate;

class ConsorzioBackend extends TwigTemplate {
    function getTemplatesDirectory()
    {
        return [
            __DIR__."/template",
            Environment::$ROOT."/backend/template"
        ];
    }

    static function getBaseDirectory()
    {
        return __DIR__;
    }


}