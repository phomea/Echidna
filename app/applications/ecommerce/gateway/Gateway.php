<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;
use applications\ecommerce\entities\Ordine;
use core\services\Response;

abstract class Gateway{

    public $prezzo = 0;
    public $cliente;
    public $carrello;


    public $data;

    public $ordine;

    /**
     * Gateway constructor.
     * @param $cliente
     * @param $this->carrello
     */
    public function __construct($cliente, $carrello)
    {
        $this->cliente = $cliente;
        $this->carrello = $carrello;

    }

    static function getType(){
        return null;
    }

    protected function _buildOrder(){

        $this->carrello->extra += $this->prezzo;
        $totale = $this->carrello->getTotal();
        $this->ordine = new Ordine([
            "id_cliente" => $this->cliente->id,
            "gateway" => static::getType(),
            "id_metodospedizione" => $this->carrello->metodoDiSpedizione->id,
            "metodospedizione"  =>  $this->carrello->metodoDiSpedizione->nome." - prezzo ".Response::formatPrice($this->carrello->metodoDiSpedizione->prezzo),
            "id_indirizzospedizione" => $this->carrello->indirizzoSpedizione->id,
            "spedizione" => $this->carrello->spedizione,
            "id_coupon" =>  empty($this->carrello->coupon) ? null : $this->carrello->coupon->id,
            "subtotale" => $this->carrello->subtotale,
            "totale" => $this->carrello->totale,
            "lineitems" =>  $this->carrello->lineitems
        ]);
        $this->ordine->build();
        if( !empty($this->carrello->coupon) ){
            $this->carrello->coupon->utilizzi += 1;
            $this->carrello->coupon->save();
        }

        return $this->ordine;
    }
    protected function _saveOrder(){
        $this->ordine->save();
        return $this->ordine;
    }
    protected function _processOrder(){

        return $this->_buildOrder();
    }

    public function processOrder(){
        $this->_processOrder();
        return $this->_saveOrder();
    }


}