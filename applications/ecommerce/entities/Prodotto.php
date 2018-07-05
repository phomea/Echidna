<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Prodotto extends Model{
    static function getTable()
    {
        return "ecommerce_prodotto";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(256)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea"),
            "id_ecommerce_tipologia_prodotto"   =>  Field::int()->editable(true)->setTemplate("select")->setTemplateVar(\applications\ecommerce\TipologiaProdotto::getForSelect())
        ];
    }

    public function expand(){
        $this->tipologia = TipologiaProdotto::findById($this->id_ecommerce_tipologia_prodotto);
        $this->tipologia->getFields();

        $sql = "SELECT * FROM ecommerce_prodotto_campi WHERE id_ecommerce_prodotto=:id";
        $r = Db::$connection->fetchAll($sql,[
            "id"    =>  $this->id
        ]);

        $this->valoriCampi = [];
        foreach ($r as $item){
            $this->valoriCampi[$item['slug']] = $item;
        }

    }

}