<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class VarianteAttributo extends Model{
    static function getTable()
    {
        return "ecommerce_prodotto_variante_attributi";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_ecommerce_prodotto_variante"  =>  Field::int()->index(),
            "id_ecommerce_attributo"  =>  Field::int()->index()
        ];
    }

    static function findByVariante( $id ){
        return static::findById_ecommerce_prodotto_variante( $id );
    }

    static function getInstance($data)
    {
        $instance = parent::getInstance($data); // TODO: Change the autogenerated stub

        $instance->attributo = Attributo::findById($instance->id_ecommerce_attributo);


        $instance->valore = AttributoValore::findById($instance->id_valore);
        return $instance;
    }


}