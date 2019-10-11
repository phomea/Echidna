<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Provincia extends Model{
    static function getTable()
    {
        return "ecommerce_provincia";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_country"  =>  Field::int()->index(),
            "id_zone"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Zona::getForSelect("name","id"))->index(),
            "name"  =>  Field::varchar(64)->editable(),
            "iso_code"   =>  Field::text()->editable(),
            "id_country"    =>  Field::int()->editable()

        ];
    }


}