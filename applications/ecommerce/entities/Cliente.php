<?php
namespace applications\ecommerce\entities;

use core\db\Field;
use core\Model;

class Cliente extends Model {
    const TYPE_CUSTOMER = 1;
    const TYPE_B2B = 2;


    public $nome;
    public $cognome;
    public $email;
    public $tipo = self::TYPE_CUSTOMER;

    static function schema()
    {
        return [
            "id"        =>  Field::primaryIndex(),
            "nome"      =>  Field::varchar(512)->editable(),
            "cognome"   =>  Field::varchar(512)->editable(),
            "email"     =>  Field::varchar(512)->editable(),
            "password"  =>  Field::varchar(512),
            "tipo"      =>  Field::int(),
            "id_braintree"  =>  Field::varchar(512)->editable()
        ];
        // TODO: Implement schema() method.
    }

    static function getTable()
    {
        return "ecommerce_cliente";
    }


}