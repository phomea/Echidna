<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Ordine;
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

    static function getEntityClass()
    {
        return Ordine::class;
    }

}