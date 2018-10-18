<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Spedizione extends Model{
    static function getTable()
    {
        return "ecommerce_spedizione";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(64)->editable(),
            "sku"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "id_zona"  =>  Field::int(11)->editable()->setTemplate("select")->setTemplateVar(Zona::getForSelect("name","id")),
            "prezzo"   =>  Field::float()->editable(),

        ];
    }

    public function expand(){
        $attributi = VarianteAttributo::findByVariante( $this->id );

        $this->attributi = $attributi;
    }
}