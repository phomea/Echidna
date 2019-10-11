<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class AttributoValore extends Model{
    static function getTable()
    {
        return "ecommerce_attributo_valore";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),

            "id_ecommerce_attributo"  =>  Field::int()->index(),
            "valore"    =>  Field::text(),
            "nomefile"    =>  Field::text(),
            "label"    =>  Field::text()


        ];
    }

    static function findByVariante( $id ){
        return static::findById_ecommerce_prodotto_variante( $id );
    }



}