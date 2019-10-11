<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Country extends Model{
    static function getTable()
    {
        return "ecommerce_country";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_zone"  =>  Field::int(),
            "id_currency"  =>  Field::int(),
            "iso_code"  =>  Field::varchar(3),
            "call_prefix"   =>  Field::int(),
            "need_zip_code" =>  Field::boolean(),
            "zip_code_format"   =>  Field::varchar(12)
        ];
    }

}