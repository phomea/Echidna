<?php
namespace applications\ecommerce\entities;

use core\db\Field;
use core\Model;

class OrdineLineItem extends Model
{
    static function getTable()
    {
        return "ecommerce_ordine_lineitem";
    }


    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_ecommerce_ordine"   =>  Field::int(),
            "id_variant"    =>  Field::int(),
            "quantity"      =>  Field::int(),
            "single_price"  =>  Field::int(),
            "price_total"   =>  Field::int(),
            "attributi"     =>  Field::text(),
            "nome"          =>  Field::text(),
            "sku"           =>  Field::text(),
            "peso"          =>  Field::text()
        ];
    }

    public function __construct($data = array())
    {

        $this->id_variant = $data->id_variant;
        $this->quantity = $data->quantity;
        $this->single_price = $data->single_price;
        $this->price_total = $data->price_total;
        $this->attributi = json_encode( $data->attributi );

        $this->peso = $data->variant->peso;
        $this->nome = $data->variant->nome;
        $this->sku = $data->variant->sku;
    }

    public function setOrder( $order ){
        $this->id_ecommerce_ordine = $order->id;
    }

}