<?php
namespace applications\ecommerce\entities;

class LineItem{
    public $variant = null;
    public $id_variant;
    public $quantity = 0;

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

    public function update(){

        $this->variant = Variante::findById($this->id_variant);

        $this->single_price = $this->variant->prezzo;
        $this->price_total = $this->variant->prezzo * $this->quantity;

        $this->prodotto = Prodotto::findById($this->variant->id_prodotto);
        return $this;
    }

}