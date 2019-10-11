<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Promo extends Model{
    static function getTable()
    {
        return "ecommerce_promo";
    }

    static function schema()
    {
        return [
            "id"            =>  Field::primaryIndex(),
            "nome"          =>  Field::varchar(64)->editable(),
            "tipo"          =>  Field::varchar(64)->editable()->setTemplate("select")->setTemplateVar([
                ["label"    =>  "Prezzo", "value" => "prezzo"],
                ["label"    =>  "Percentuale","value"   =>  "percentuale"]
            ]),
            "valore"        =>  Field::varchar(128)->editable(),
            "start_date"    =>  Field::date()->editable()->setTemplate("data")->index(),
            "end_date"      =>  Field::date()->editable()->setTemplate("data")->index(),
            "categoria"     =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Categoria::getForSelect("nome","id"))->index()

        ];
    }

    /**
     * @param $variant Variante
     */
    static function applyToVariant( $price, $variant){

        $categoriesId = [];

        foreach( $variant->getCategories() as $v){
            $categoriesId[] = $v->id;
        }

        /*foreach( $variant->getProduct()->categories as $v){
            $categoriesId[] = $v->id;
        }*/

        if(empty($categoriesId)) return 0;

        $promo =Promo::query()
            ->where("start_date < NOW()")
            ->where("end_date > NOW()")
            ->where("categoria IN(".implode(",",$categoriesId).")")
            ->getOne();
        

       if($promo) {
           $price = $promo->tipo == 'prezzo' ? $promo->valore : $price / 100 * $promo->valore;
            return $price;
       }else{
           return 0;
       }
    }
}