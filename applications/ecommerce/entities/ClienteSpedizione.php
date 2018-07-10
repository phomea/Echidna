<?php
namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;

class ClienteSpedizione extends Model{
    static function getTable()
    {
        return "ecommerce_cliente_spedizione";
    }


    static function schema()
    {
        return [
            "id"        =>  Field::primaryIndex(),
            "nome"      =>  Field::varchar(512),
            "cognome"   =>  Field::varchar(512),
            "via"       =>  Field::varchar(512),
            "numero"    =>  Field::varchar(64),
            "id_zona"   =>  Field::int(),
            "id_provincia"  =>  Field::int(),
            "id_cliente"    =>  Field::int(),
            "citta"     =>  Field::varchar(512)
        ];
    }

}