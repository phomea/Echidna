<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Provincia;
use core\abstracts\Application;
use core\abstracts\BackendApplication;

class Provincie extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function getEntityClass()
    {
        return Provincia::class;
    }


}