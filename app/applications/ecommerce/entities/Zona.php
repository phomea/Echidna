<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Zona extends Model{
    static function getTable()
    {
        return "ecommerce_zona";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "name"  =>  Field::varchar(512)->editable(),
            "active"  =>  Field::int()

        ];
    }

}