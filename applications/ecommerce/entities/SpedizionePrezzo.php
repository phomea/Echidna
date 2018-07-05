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
            "id_ecommerce_spedizione"    =>  Field::int(),
            "min"    =>  Field::int(),
            "max"    =>  Field::int(),
            "type"  =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar([
                "options"=>[
                    "label"=>"Peso","value"=>"Peso",
                    "label"=>"Prezzo","value"=>"PREZZO"
                ]
            ])

        ];
    }

    public function expand(){
        $attributi = VarianteAttributo::findByVariante( $this->id );

        $this->attributi = $attributi;
    }
}