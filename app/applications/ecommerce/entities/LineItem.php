<?php
namespace applications\ecommerce\entities;

class LineItem{
    public $variant = null;
    public $id_variant;
    public $quantity = 0;
    public $cart = null;
    public $single_price;
    public $price_total = 0;

    public $attributi = [];



    /**
     * LineItem constructor.
     * @param null $variant_id
     * @param int $quantity
     */
    public function __construct($variant_id, $quantity)
    {

        $this->id_variant = $variant_id;

        $this->quantity = $quantity;

        $this->update();
    }

    public function update( $cart = null ){

        $this->cart = $cart;
        $this->variant = Variante::findById($this->id_variant);

        if( $this->variant) {
            $this->single_price = $this->variant->calculatePrice()->real_price;
            $this->price_total = $this->single_price * $this->quantity;

            $this->prodotto = Prodotto::findById($this->variant->id_prodotto);
            return $this;
        }else{
           $this->remove();
        }
    }

    public function remove(){

        $key = array_search($this,$this->cart->lineitems);

        unset($this->cart->lineitems[$key]);
        $this->cart->lineitems = array_values($this->cart->lineitems);
    }


    public function additionalAttributes( $attributes = [] ){
        foreach ($attributes as $key=>$value){
            $a = Attributo::findById($key);
            $v = AttributoValore::findById($value);
            $a->valore = $v;
            $this->attributi[] = $a;

        }
    }


}