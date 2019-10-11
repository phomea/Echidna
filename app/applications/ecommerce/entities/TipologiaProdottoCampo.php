<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class TipologiaProdottoCampo extends Model{

    static $idsSelect = null;

    static function getTable()
    {
        return "ecommerce_tipologia_prodotto_campi";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(256)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "valore"=>  Field::varchar(512),
            "id_ecommerce_tipologia_prodotto" =>  Field::int()->editable()->setTemplate("select")->setTemplateVar([\applications\ecommerce\TipologiaProdotto::class,"getForSelect"])->index()
        ];
    }


}