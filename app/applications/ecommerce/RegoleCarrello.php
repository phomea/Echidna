<?php
namespace applications\ecommerce;

use applications\ecommerce\entities\RegolaCarrello;
use core\abstracts\BackendApplication;

class RegoleCarrello extends BackendApplication{
    static function getEntityClass()
    {
        return RegolaCarrello::class; // TODO: Change the autogenerated stub
    }

    static function getApplication()
    {
        return EcommerceApplication::class; // TODO: Change the autogenerated stub
    }
}