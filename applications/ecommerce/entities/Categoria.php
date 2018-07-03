<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;

class Categoria extends Model{
    static function getTable()
    {
        return "ecommerce_categoria";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(256)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea"),
            "padre"         =>  Field::int()->setDefault(-1)
        ];
    }

}