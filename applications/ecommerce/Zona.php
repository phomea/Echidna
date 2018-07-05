<?php

namespace applications\ecommerce;

use core\abstracts\Application;
use core\abstracts\BackendApplication;

class Zona extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function getEntityClass()
    {
        return \applications\ecommerce\entities\Zona::class;
    }

}