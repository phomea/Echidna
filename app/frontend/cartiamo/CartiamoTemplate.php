<?php

namespace frontend\cartiamo;

use core\template\TwigTemplate;

class CartiamoTemplate extends TwigTemplate {
    function getTemplatesDirectory()
    {

        return __DIR__."/template";
    }
}