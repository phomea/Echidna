<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class TipologiaProdotto extends Model{

    static $idsSelect = null;

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
            "prezzo"        =>  Field::int()->editable(),
            "id_tipologia_prodotto" =>  Field::int()->editable()->setTemplate("select")->setTemplateVar([\applications\ecommerce\TipologiaProdotto::class,"getForSelect"])
        ];
    }


    public function getFields(){

        $campi = [];
        if( $this->id_tipologia_prodotto > 0 ){
            $t = TipologiaProdotto::findById($this->id_tipologia_prodotto);
            $campi = array_merge($campi,$t->getFields());
        }


        $sql = "SELECT * FROM ecommerce_tipologia_prodotto_campi WHERE id_ecommerce_tipologia_prodotto=:id";
        $cc = Db::$connection->fetchAll($sql,[
                "id" => $this->id
            ]
        );
        $campi = array_merge($campi,$cc);


        $this->campi = $campi;


        return $campi;
    }


    public function getAttributes(){


        $attributi = [];

        if( $this->id_tipologia_prodotto > 0 ){
            $t = TipologiaProdotto::findById($this->id_tipologia_prodotto);
            $a = $t->getAttributes();
            $attributi = array_merge($attributi, $a );
        }




        $sql = "SELECT * FROM ecommerce_attributo_entita as a
                    JOIN ecommerce_attributo as b on a.id_attributo=b.id
                    WHERE entita=:entita AND id_entita=:id_entita 
            ";

        $r = Db::$connection->fetchAll($sql,[
            "entita"    => "ecommerce_tipologia_prodotto",
            "id_entita" =>  $this->id
        ]);

        foreach ($r as $key=>$item) {
            $sql = "SELECT * FROM ecommerce_attributo_valore WHERE id_ecommerce_attributo=:id";
            $valori = Db::$connection->fetchAll($sql,[
                "id" => $item['id_attributo']
            ]);

            $r[$key]["possibili_valori"] = $valori;


            $r[$key]['attributo'] =Attributo::findById($item['id_attributo']);
        }

        $attributi = array_merge($attributi,$r);




        /*
            foreach ($getFrom as $value){
                $sql = "SELECT * FROM ecommerce_attributo_entita as a
                    JOIN ecommerce_attributo as b on a.id_attributo=b.id
                    WHERE entita=:entita AND id_entita=:id_entita 
            ";

            $r = Db::$connection->fetchAll($sql,[
                "entita"    => "ecommerce_tipologia_prodotto",
                "id_entita" =>  $value
            ]);

            foreach ($r as $key=>$item) {
                $sql = "SELECT * FROM ecommerce_attributo_valore WHERE id_ecommerce_attributo=:id";
                $valori = Db::$connection->fetchAll($sql,[
                    "id" => $item['id_attributo']
                ]);

                $r[$key]["possibili_valori"] = $valori;
            }


            $attributi = array_merge($attributi,$r);


        }*/




        return $attributi;
    }

}