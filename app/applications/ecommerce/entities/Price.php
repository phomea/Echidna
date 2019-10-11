<?php

namespace applications\ecommerce\entities;

class Price{
    public $real_price;

    public $old_price;

    public $sconto;

    public $sconto_perc;



    /**
     * Price constructor.
     * @param $real_price
     * @param $old_price
     */
    public function __construct($real_price = null, $old_price = null, $variant = null )
    {

        $this->real_price = $real_price;
        $this->old_price = $old_price;
        if( empty($this->real_price) ) $this->real_price = $this->old_price;

        if($variant == null ){

        }else{


            $discount = Promo::applyToVariant($this->real_price, $variant );

            $this->real_price -= $discount;
        }




        $this->calculate();
    }

    public function calculate(){


        $this->sconto = $this->old_price - $this->real_price;
        //$this->sconto_perc = round($this->real_price * 100 / $this->old_price);
        $this->sconto_perc = round( 100 / $this->old_price *   $this->sconto);

    }




}