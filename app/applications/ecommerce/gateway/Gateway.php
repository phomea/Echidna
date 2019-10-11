<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;
use applications\ecommerce\entities\Ordine;
use applications\ecommerce\entities\Pagamento;
use core\services\Response;

abstract class Gateway{

    public $prezzo = 0;
    public $cliente;
    public $carrello;
    public $metodo_pagamento;


    public $data;

    public $ordine;
    public $id_gateway;

    /**
     * Gateway constructor.
     * @param $cliente
     * @param $this->carrello
     */
    public function __construct($cliente, $carrello,$id_gateway,$metodo_pagamento)
    {
        $this->cliente = $cliente;
        $this->carrello = $carrello;
        $this->id_gateway = $id_gateway;
        $this->metodo_pagamento = $metodo_pagamento;

    }

    static function getType(){
        return null;
    }

    protected function _buildOrder(){

        $created_at= new \DateTime();
        $anno = $created_at->format("y");
        $yearEnd = date('Y-m-d', strtotime('Dec 31'));
        $yearStart = date('Y-m-d', strtotime('Jan 1'));

        $ordinePrecedente = Ordine::query()->where('created_at >= "'.$yearStart.'"')->where('created_at <= "'.$yearEnd.'"')
            ->setOrderBy("id","DESC")
            ->getOne();

        $progressivoPrecedente = 1000;
        if($ordinePrecedente){
            $progressivoPrecedente = $ordinePrecedente->progressivoordine != null ? $ordinePrecedente->progressivoordine : 1000;
        }
        $progressivo = $progressivoPrecedente +1;
        $numeroOrdine = $anno."W".$progressivo;



        $this->carrello->extra += $this->prezzo;
        $totale = $this->carrello->getTotal();
        $this->ordine = new Ordine([
            "id_carrello"   =>  $this->carrello->id,
            "progressivoordine" =>  $progressivo,
            "numeroordine"  =>  $numeroOrdine,
            "created_at"    =>  $created_at,
            "id_gateway"    =>  $this->id_gateway,
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

        $this->pagamento = new Pagamento([
            "id_carrello"   =>  $this->carrello->id,
            "created_at"    =>  $created_at,
            "id_gateway"    =>  $this->id_gateway,
            "id_cliente" => $this->cliente->id,
            "gateway" => static::getType(),
            "id_coupon" =>  empty($this->carrello->coupon) ? null : $this->carrello->coupon->id,
            "created_at"    =>  $created_at,
            "totale" => $this->carrello->totale,
            "stato"  => "placed"
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


        $this->pagamento->id_ordine = $this->ordine->id;
        $this->pagamento->save();

        $this->carrello->stato = "order";
        $this->carrello->save();
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