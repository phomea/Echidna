<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Ordine;
use applications\ecommerce\entities\Prodotto;
use core\abstracts\Application;
use core\abstracts\BackendApplication;

class Prodotti extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }


    static function getEntityClass()
    {
        return Prodotto::class;
    }

}