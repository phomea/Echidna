<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;

class Contrassegno extends Gateway {
    static function getType()
    {
        return "contrassegno";
    }



}