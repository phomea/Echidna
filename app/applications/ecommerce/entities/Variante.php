<?php

namespace applications\ecommerce\entities;


use applications\ecommerce\Prodotti;
use core\db\Field;
use core\Model;
use core\services\Db;

class Variante extends Model{
    static function getTable()
    {
        return "ecommerce_prodotto_variante";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_prodotto"  =>  Field::int(),
            "nome"  =>  Field::varchar(512)->editable(),
            "sku"  =>  Field::varchar(64)->editable(),
            "prezzo"   =>  Field::text()->editable(),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea")

        ];
    }

    public function expand(){
        $attributi = VarianteAttributo::findByVariante( $this->id );

        $this->attributi = $attributi;
        $this->images = $this->getImages();
        $this->campi = $this->getCampi();
    }

    public function getProduct(){
        return Prodotto::findById($this->id_prodotto);
    }

    public function getCampi(){


        $sql = "select * from ecommerce_prodotto_variante_campi where id_ecommerce_prodotto_variante = :id";
        return Db::$connection->fetchAll($sql,[
            "id"    =>  $this->id
        ]);
    }

    public function gotAttributeValue ( $id ){




        $got = false;
        foreach ($this->attributi as $key => $value){
            if( $value->valore->id == $id){
                $got = true;
            }
        }

        return $got;
    }

    public function getImages(){
        $sql =  "SELECT * FROM ecommerce_prodotto_variante_immagine WHERE id_variante=:id_variante";

        return Db::$connection->fetchAll($sql,[
            "id_variante"   =>  $this->id
        ]);
    }

}