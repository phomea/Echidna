<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class Coupon extends Model{
    const TIPO_PERCENTUALE = 0;
    const TIPO_IMPORTO = 1;


    static function getTable()
    {
        return "ecommerce_coupon";
    }

    static function schema()
    {
        return array_merge([
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(64)->editable(),
            "inizio"   =>  Field::date()->editable(),
            "fine"     =>  Field::date()->editable(),
            "max_utilizzi"  =>  Field::int()->editable(),
            "totale_sconto" =>  Field::int()->editable(),
            "tipo_sconto"   =>  Field::int()->editable()->setDefault(self::TIPO_PERCENTUALE)->setTemplate("select")->setTemplateVar([
                [
                    "label" => "Percentuale",
                    "value" =>  self::TIPO_PERCENTUALE
                ],
                [
                    "label" => "Importo",
                    "value" =>  self::TIPO_IMPORTO
                ]
            ]),
            "utilizzi"  =>  Field::int()->setDefault(0)
        ],parent::schema());
    }


    function calcolaSconto( $somma ){




        if( $this->tipo_sconto == self::TIPO_PERCENTUALE ){
            return $somma / 100 * $this->totale_sconto;
        }
        if( $this->tipo_sconto == self::TIPO_IMPORTO ){
            return $this->totale_sconto;
        }

    }

    function refresh(){
        $c = self::findById($this->id);
        $this->nome = $c->nome;
        $this->inizio = $c->inizio;
        $this->fine = $c->fine;
        $this->max_utilizzi = $c->max_utilizzi;
        $this->totale_sconto = $c->totale_sconto;
        $this->tipo_sconto = $c->tipo_sconto;
        $this->utilizzi = $c->utilizzi;
    }

    function canAddToCart(){
        $this->refresh();
        if( $this->utilizzi >= $this->max_utilizzi){
            return false;
        }
        return true;
    }


}