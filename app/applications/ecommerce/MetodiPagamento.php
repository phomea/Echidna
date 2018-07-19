<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\MetodoPagamento;
use applications\ecommerce\entities\Ordine;
use core\abstracts\Application;
use core\abstracts\BackendApplication;

class MetodiPagamento extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function getEntityClass()
    {
        return MetodoPagamento::class;
    }

}