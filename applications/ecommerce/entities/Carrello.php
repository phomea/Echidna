<?php
namespace applications\ecommerce\entities;

use core\services\SessionService;

class Carrello{
    const SESSION_NAME = "ecommerce.carrello";

    public $lineitems = [];


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
    }

    public function save(){
        SessionService::set(Carrello::SESSION_NAME,$this);
    }

    public function getTotal(){
        $this->update();
        $totale = 0;
        foreach ($this->lineitems as $lineitem) {
            $totale += $lineitem->price_total;
        }

        return $totale;
    }
}