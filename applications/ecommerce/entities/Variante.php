<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Variante extends Model{
    static function getTable()
    {
        return "ecommerce_prodotto_variante";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_prodotto"  =>  Field::int(),
            "sku"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "prezzo"   =>  Field::text()->editable(),

        ];
    }

    public function expand(){
        $attributi = VarianteAttributo::findByVariante( $this->id );

        $this->attributi = $attributi;
    }
}