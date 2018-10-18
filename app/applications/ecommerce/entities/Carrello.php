<?php
namespace applications\ecommerce\entities;

use core\services\Response;
use core\services\SessionService;

class Carrello{
    const SESSION_NAME = "ecommerce.carrello";

    public $lineitems = [];
    public $cliente = null;

    public $subtotale = 0;
    public $totale = 0;
    public $spedizione = 0;

    public $metodiDiSpedizione = null;
    public $indirizzoSpedizione = null;

    public $coupon;
    public $totaleSconto;

    public $metodoDiSpedizione = null;


    static function get(){
        if($carrello = SessionService::get( Carrello::SESSION_NAME )) {

            $carrello->update();

            return $carrello;
        }else{
            return new self();
        }
    }

    public function createLineItem( $id_variant, $quantity){
        $this->add(new LineItem($id_variant,$quantity));
        return $this;
    }
    public function add( $lineitem ){
        $found =false;
        if( count($this->lineitems) > 0){
            foreach ($this->lineitems as $li) {
                if($li->variant->id == $lineitem->variant->id){
                    $found = true;
                    $li->quantity += $lineitem->quantity;
                    break;
                }
            }
        }
        if(!$found)
            $this->lineitems[] = $lineitem;

        $this->update();
        $this->save();
        return $this;
    }

    public function update(){
        if(count($this->lineitems)>0){
            foreach ($this->lineitems as $value){
                $value->update( $this );
            }
        }

        if( $this->cliente != null ){
            $indirizzoSpedizione = ClienteSpedizione::findById_cliente( $this->cliente->id)[0];
            $this->indirizzoSpedizione = $indirizzoSpedizione;
            $provincia = Provincia::findById($indirizzoSpedizione->id_provincia);
            $zona = \applications\ecommerce\entities\Zona::findById($provincia->id_zone);

            $this->metodiDiSpedizione = Spedizione::findById_zona($zona->id);



            if( count($this->metodiDiSpedizione) == 0 ){
                $this->setMetodoSpedizione(null);
            }else if(count($this->metodiDiSpedizione) == 1){
                $this->setMetodoSpedizione($this->metodiDiSpedizione[0]);
            }else{


                //$this->setMetodoSpedizione(null);
            }
        }



        // calcolo totali
        $totale = 0;
        foreach ($this->lineitems as $lineitem) {
            $totale += $lineitem->price_total;
        }
        $this->subtotale = $totale;

        if($this->coupon){
            if($this->coupon->canAddToCart()) {
                $totaleSconto = $this->coupon->calcolaSconto($totale);
                $this->totaleSconto = $totaleSconto;
                $totale -= $this->totaleSconto;
            }else{
                $this->coupon=null;
            }
        }

        if( !empty($this->metodoDiSpedizione ) ){
            $totale += $this->metodoDiSpedizione->prezzo;
            $this->spedizione = $this->metodoDiSpedizione->prezzo;
        }


        if( $totale < 0 ) $totale = 0;
        $this->totale = $totale;

    }

    public function setMetodoSpedizione( $metodo ){
        $this->metodoDiSpedizione = $metodo;

    }
    public function save(){
        SessionService::set(Carrello::SESSION_NAME,$this);
    }

    public function getTotal(){
        $this->update();

        return $this->totale;
    }

    public function setCliente( $cliente ){
        $this->cliente = $cliente;
    }

    public function printTotale(){
        return Response::formatPrice( $this->totale );
    }
    public function printSubtotale(){
        return Response::formatPrice( $this->subtotale );
    }
    public function printSpedizione(){
        return Response::formatPrice( $this->spedizione );
    }

    /**
     * @param $c Coupon
     */
    public function addCoupon( $c ){


        if($c->canAddToCart()) {
            if ($c) {
                $this->coupon = $c;
                return true;
            }
        }
        return false;
    }
    public function rimuoviCoupon( ){
        $this->coupon = null;
    }

}