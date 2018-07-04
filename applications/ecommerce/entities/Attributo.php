<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;

class Attributo extends Model{
    static function getTable()
    {
        return "ecommerce_attributo";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"   =>  Field::varchar(512)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea")
        ];
    }

    static function getModLink(){
        return "attributo/{id:([0-9]*)}";
    }
    static function getListLink(){
        return "attributo/lista";
    }
    static function getAddLink(){
        return "attributo/aggiungi";
    }



}