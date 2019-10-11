<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class PromoCarrello extends Model{
    static function getTable()
    {
        return "ecommerce_promo_carrello";
    }

    static function schema()
    {
        return [
            "id"            =>  Field::primaryIndex(),
            "nome"          =>  Field::varchar(64)->editable(),
            "tipo_sconto"          =>  Field::varchar(64)->editable()->setTemplate("select")->setTemplateVar([
                ["label"    =>  "Prezzo", "value" => "prezzo"],
                ["label"    =>  "Percentuale","value"   =>  "percentuale"],
                ["label"    =>  "Spedizione gratuita","value"   =>  "spedizione"],
            ]),
            "valore"        =>  Field::varchar(128)->editable(),
            "start_date"    =>  Field::date()->editable()->setTemplate("data"),
            "end_date"      =>  Field::date()->editable()->setTemplate("data"),
            "condizione"    =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar([
                ["value"=>"n_prodotti","label"=>"Ci sono N prodotti nel carrello"],
                ["value"=>"n_prodotti_uguali","label"=>"Ci sono N prodotti uguali nel carrello"],
                ["value"=>"valore_minimo","label"=>"Subtotale supera N valore"],

            ]),
            "N" =>  Field::text()->editable(),
            "exclusive" =>  Field::boolean()->editable()->setDefault(0),
            "near_threashold"  =>  Field::text()->float()->editable(),
            "near_message"  =>  Field::text()->editable()

        ];
    }


    static function findActive(){
        return PromoCarrello::query()
            ->where("start_date < NOW()")
            ->where("end_date > NOW()")
            ->getAll();
    }

    /**
     * @param $carrello Carrello
     */
    function apply( $carrello ){
        $totale = $carrello->totale;
        $subtotale = $carrello->subtotale;

        switch ($this->condizione){
            case "n_prodotti":
                $n_prodotti = 0;

                $minimo = 9999999999;
                foreach ($carrello->lineitems as $l){
                    /**
                     * @var $l LineItem
                     */
                    $minimo = $l->single_price < $minimo ? $l->single_price : $minimo;
                    $n_prodotti += $l->quantity;

                }

                if( $n_prodotti >= $this->N){

                    switch ($this->tipo_sconto){
                        case "prezzo" :
                            $carrello->totaleSconto+= $this->valore ;
                            if( $this->exclusive ) return false;
                            break;

                        case "percentuale" :
                            $carrello->totaleSconto+= $minimo / 100 * $this->valore ;
                            if( $this->exclusive ) return false;
                            break;
                    }

                }else{
                    if( $n_prodotti >= $this->N-1){

                        $carrello->promoNear[] = $this;
                    }
                }

                break;
            case "n_prodotti_uguali" :


                foreach ($carrello->lineitems as $l){
                    if($l->quantity >= $this->N){


                        switch ($this->tipo_sconto){
                            case "prezzo" :
                                $carrello->totaleSconto+= $this->valore ;
                                if( $this->exclusive ) return false;
                                break;

                            case "percentuale" :
                                $carrello->totaleSconto+= $l->single_price / 100 * $this->valore ;
                                if( $this->exclusive ) return false;
                                break;
                        }

                    }else{

                        $diff = $this->N - $l->quantity;

                        if( $diff <= $this->near_threashold) {
                            $this->near_message = sprintf($this->near_message, $diff, $l->variant->getProduct()->nome);
                            $carrello->promoNear[] = $this;
                        }
                    }
                }
                break;
            case "valore_minimo":


                if( $subtotale > $this->N){

                    switch ($this->tipo_sconto){
                        case "prezzo":
                            $carrello->totaleSconto += $this->valore;
                            if( $this->exclusive ) return false;
                            break;
                        case "percentuale" :
                            $carrello->totaleSconto += $subtotale / 100 * $this->valore;
                            if( $this->exclusive ) return false;
                            break;
                    }
                }else{


                    if( $subtotale > $this->N - $this->near_threashold ){

                        $diff = $this->N - $subtotale;


                        $this->near_message = sprintf($this->near_message,$diff);

                        $carrello->promoNear[] = $this;
                    }
                }
                break;
        }


        return true;

    }

}