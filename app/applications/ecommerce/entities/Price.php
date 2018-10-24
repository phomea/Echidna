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
    public function __construct($real_price = null, $old_price = null )
    {
        $this->real_price = $real_price;
        $this->old_price = $old_price;

        $this->calculate();
    }

    public function calculate(){
        if( empty($this->real_price) ) $this->real_price = $this->old_price;

        $this->sconto = $this->old_price - $this->real_price;
        $this->sconto_perc = $this->real_price * 100 / $this->old_price;
    }




}