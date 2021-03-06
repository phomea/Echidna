<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Ordine;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Email;

class PromoCarrelloBackend extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }


    static function getEntityClass()
    {
        return \applications\ecommerce\entities\PromoCarrello::class;
    }

}