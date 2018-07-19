<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;

abstract class Gateway{

    public $prezzo = 0;

    static function getType(){
        return null;
    }
}