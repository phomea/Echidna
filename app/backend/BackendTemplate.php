<?php

namespace backend;

use core\Environment;
use core\template\TwigTemplate;

class BackendTemplate extends TwigTemplate {
    function getTemplatesDirectory()
    {
        return [
            __DIR__."/template",
            Environment::$ROOT."/frontend/spagnesi/applications",
            Environment::$ROOT."/frontend/spagnesi/template"
        ];
    }

    static function getBaseDirectory()
    {
        return __DIR__;
    }


}