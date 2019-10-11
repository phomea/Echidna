<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class SpedizionePrezzo extends Model{
    static function getTable()
    {
        return "ecommerce_spedizione_prezzo";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_ecommerce_spedizione"    =>  Field::int()->editable()->index(),
            "min"    =>  Field::int()->editable(),
            "max"    =>  Field::int()->editable(),
            "prezzo"    =>  Field::float()->editable(),
            "type"  =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar(
                [
                    ["label"=>"Peso","value"=>"peso"],
                    ["label"=>"Prezzo","value"=>"prezzo"]
                ]
            )

        ];
    }

    public function expand(){
        $attributi = VarianteAttributo::findByVariante( $this->id );
        $this->attributi = $attributi;
    }
}