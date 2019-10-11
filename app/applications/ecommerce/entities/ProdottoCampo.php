<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class ProdottoCampo extends Model{

    static $idsSelect = null;

    static function getTable()
    {
        return "ecommerce_prodotto_campi";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "valore"=>  Field::varchar(512),
            "id_ecommerce_prodotto" =>  Field::int()->editable()->setTemplate("select")->setTemplateVar([\applications\ecommerce\TipologiaProdotto::class,"getForSelect"])->index()
        ];
    }


}