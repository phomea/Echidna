<?php

namespace applications\ecommerce\entities;

use core\db\Field;

class Ordine extends \core\Model {
    static function getTable()
    {
        return "ecommerce_ordine";
    }

    static function schema()
    {
       return [
           "id" =>  Field::primaryIndex(),
           "id_cliente" =>  Field::int(),
           "id_metodospedizione" =>  Field::int(),
           "id_indirizzospedizione" =>  Field::int(),
           "id_coupon" =>  Field::int(),
           "gateway"    =>  Field::varchar(512)->editable(),
           "id_transaction" =>  Field::varchar(512)->editable(),
           "created_at"     =>  Field::date()->editable(),
           "updated_at"     =>  Field::date()->editable(),
           "subtotale"     =>  Field::int()->editable(),
           "totale"     =>  Field::int()->editable(),
           "spedizione"     =>  Field::int()->editable(),
           "stato"  =>  Field::varchar(128)->editable()->setTemplate("select")->setTemplateVar([
               ["label"=>"Piazzato","value"=>"placed"],
               ["label"=>"In attesa di spedizione","value"=>"shipping"],
               ["label"=>"Spedito","value"=>"delivered"],
           ])
       ];
    }


    function getNumeroOrdine(){
        return Date("y").Date("m").str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    function getShippingAddress(){
        if( !empty($this->id_indirizzospedizione ))
            return ClienteSpedizione::findById($this->id_indirizzospedizione);

        return null;
    }


}