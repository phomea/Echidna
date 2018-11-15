<?php
namespace applications\ecommerce\entities;

use applications\ecommerce\EcommerceFrontend;
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

    public $pesoTotale = 0;

    public $extra = 0;


    static function get(){
        if($carrello = SessionService::get( Carrello::SESSION_NAME )) {

            $carrello->update();

            return $carrello;
        }else{
            $carrello =  new self();
            if($carrello->cliente == null && SessionService::get(EcommerceFrontend::SESSION_USER_LOGGED)){
                $carrello->cliente = SessionService::get(EcommerceFrontend::SESSION_USER_LOGGED);
            }


            return $carrello;
        }
    }

    public function createLineItem( $id_variant, $quantity, $stack=true){
        $this->add(new LineItem($id_variant,$quantity),$stack);
        return $this;
    }

    public function removeByVariant($id){
        if( count($this->lineitems) > 0){
            foreach ($this->lineitems as $key => $li) {
                if($li->variant->id == $id){
                    unset($this->lineitems[$key]);
                    break;
                }
            }
        }
        $this->save();
    }
    public function add( $lineitem , $stack=true ){
        $found =false;
        if($stack) {
            if (count($this->lineitems) > 0) {
                foreach ($this->lineitems as $li) {
                    if ($li->variant->id == $lineitem->variant->id) {
                        $found = true;
                        $li->quantity += $lineitem->quantity;
                        break;
                    }
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
        $this->pesoTotale = 0;
        if(count($this->lineitems)>0){
            foreach ($this->lineitems as $value){
                $value->update( $this );

                $this->pesoTotale += (int)$value->variant->peso * (int)$value->quantity;
            }
        }


        if( $this->cliente != null ){
            $indirizzoSpedizione = ClienteSpedizione::findById_cliente( $this->cliente->id)[0];
            $this->indirizzoSpedizione = $indirizzoSpedizione;


            $this->metodiDiSpedizione = $this->findAvailableShippingTypes($indirizzoSpedizione);



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


        $this->totale += $this->extra;

        if( $totale < 0 ) $totale = 0;
        $this->totale = $totale;




    }

    public function findAvailableShippingTypes( $indirizzoSpedizione ){
        $provincia = Provincia::findById($indirizzoSpedizione->id_provincia);
        $zona = \applications\ecommerce\entities\Zona::findById($provincia->id_zone);

        $spedizioniZone = Spedizione::findById_zona($zona->id);

        $spedizioniDisponibili = [];
        foreach ($spedizioniZone as $value){
            $query = SpedizionePrezzo::query();

            $prezziDisponibili = $query
                ->where("id_ecommerce_spedizione = ".$value->id)
                ->where("(min < ".$this->pesoTotale." OR min is NULL)")
                ->where("(max > ".$this->pesoTotale." OR max is NULL)")
                ->getAll();

            if( count($prezziDisponibili) > 0 ){
                $value->setPrezzo($prezziDisponibili[0]);
                $spedizioniDisponibili [] = $value;
            }
        }



        return $spedizioniDisponibili;
        return Spedizione::findById_zona($zona->id);
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
        $this->save();
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