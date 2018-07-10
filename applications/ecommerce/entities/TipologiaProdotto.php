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
            "prezzo"        =>  Field::int()->editable(),
            "id_tipologia_prodotto" =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(\applications\ecommerce\TipologiaProdotto::getForSelect())
        ];
    }


    public function getFields(){
        $sql = "SELECT * FROM ecommerce_tipologia_prodotto_campi WHERE id_ecommerce_tipologia_prodotto=:id";
        $campi = Db::$connection->fetchAll($sql,[
                "id" => $this->id
            ]
        );


        if( $this->id_tipologia_prodotto > 0 ){
            $sql = "SELECT * FROM ecommerce_tipologia_prodotto_campi WHERE id_ecommerce_tipologia_prodotto=:id";
            $campip = Db::$connection->fetchAll($sql,[
                    "id" => $this->id_tipologia_prodotto
                ]
            );

            $campi = array_merge($campi,$campip);
        }

        $this->campi = $campi;


        return $campi;
    }


    public function getAttributes(){

        $getFrom = [];
        if( $this->id_tipologia_prodotto > 0 ){
            $getFrom[] = $this->id_tipologia_prodotto;
        }


        $getFrom[] = $this->id;
        $attributi = [];


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


        }




        return $attributi;
    }

}