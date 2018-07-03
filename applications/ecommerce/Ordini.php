<?php

namespace applications\ecommerce;

use core\abstracts\Application;
use core\abstracts\BackendApplication;

class Ordini extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function ordini(){

        return [
            "ecommerce/templates/ordini",[]
        ];
    }
}