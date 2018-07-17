<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class AttributoTipo extends Model{
    static function getTable()
    {
        return "ecommerce_attributo_tipo";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "tipo"  =>  Field::text()

        ];
    }

}