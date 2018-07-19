<?php
namespace applications\ecommerce\entities;


use applications\ecommerce\gateway\Braintree;
use applications\ecommerce\gateway\Contrassegno;
use core\db\Field;
use core\Model;

class MetodoPagamento extends Model{
    static function getTypes(){
        return [
            [
                "label" =>  "Braintree",
                "value" =>  "braintree"
            ],
            [
                "label" =>  "Contrassegno",
                "value" =>  "contrassegno"
            ]
        ];
    }

    static function getGateway(){
        if( $this->type == "braintree"){
            return new Braintree();
        }
        if( $this->type == "contrassegno"){
            return new Contrassegno();
        }
    }

    static function getTable()
    {
        return "ecommerce_metodopagamento";
    }

    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(512)->editable(),
            "type"  =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar(self::getTypes()),
            "prezzo"  =>  Field::varchar(512)->editable()
        ];
    }

}