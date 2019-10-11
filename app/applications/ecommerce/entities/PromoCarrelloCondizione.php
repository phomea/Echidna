<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class PromoCarrelloCondizione extends Model{
    static function getTable()
    {
        return "ecommerce_promo_carrello_condizione";
    }

    static function schema()
    {
        return [
            "id"            =>  Field::primaryIndex(),
            "nome"          =>  Field::varchar(64)->editable(),
            "tipo"          =>  Field::varchar(64)->editable()->setTemplate("select")->setTemplateVar([
                ["label"    =>  "Prezzo", "value" => "prezzo"],
                ["label"    =>  "Percentuale","value"   =>  "percentuale"]
            ]),
            "valore"        =>  Field::varchar(128)->editable(),
            "start_date"    =>  Field::date()->editable()->setTemplate("data"),
            "end_date"      =>  Field::date()->editable()->setTemplate("data"),
            "condizioni"     =>  Field::text()

        ];
    }

}