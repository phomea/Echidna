<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;

class Bonifico extends Gateway {
    static function getType()
    {
        return "bonifico";
    }


}