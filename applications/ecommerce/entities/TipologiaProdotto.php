<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class TipologiaProdotto extends Model{
    static function getTable()
    {
        return "ecommerce_tipologia_prodotto";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(256)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea"),
            "prezzo"        =>  Field::int()->editable()
        ];
    }


    public function getFields(){
        $sql = "SELECT * FROM ecommerce_tipologia_prodotto_campi WHERE id_ecommerce_tipologia_prodotto=:id";
        $campi = Db::$connection->fetchAll($sql,[
                "id" => $this->id
            ]
        );

        $this->campi = $campi;
        return $campi;
    }


}