<?php

namespace applications\ecommerce\entities;

use applications\ecommerce\gateway\Gateway;
use core\db\Field;
use core\services\Response;

class Ordine extends \core\Model {
    public $lineitems = [];



    static function getTable()
    {
        return "ecommerce_ordine";
    }

    static function schema()
    {
       return [
           "id" =>  Field::primaryIndex(),
           "id_carrello"    =>  Field::int()->index()->inlist(false),
           "id_cliente" =>  Field::int()->index()->editable(),
           "id_gateway" =>  Field::int()->index()->inlist(false),
           "id_metodospedizione" =>  Field::int()->index()->inlist(false),
           "id_indirizzospedizione" =>  Field::int()->index()->inlist(false),
           "id_coupon" =>  Field::int()->index()->inlist(false),
           "gateway"    =>  Field::varchar(512)->editable(),
           "id_transaction" =>  Field::varchar(512)->editable()->inlist(false),
           "created_at"     =>  Field::date()->editable(),
           "updated_at"     =>  Field::date()->editable()->inlist(false),
           "subtotale"     =>  Field::float()->editable(),
           "totale"     =>  Field::float()->editable(),
           "spedizione"     =>  Field::float()->editable(),
           "stato"  =>  Field::varchar(128)->editable()->setTemplate("select")->setTemplateVar([
               ["label"=>"Piazzato","value"=>"placed"],
               ["label"=>"In attesa di spedizione","value"=>"shipping"],
               ["label"=>"Spedito","value"=>"delivered"],
           ]),
           "indirizzospedizione"  =>    Field::text()->inlist(false),
           "metodospedizione"   =>  Field::text(),
           "progressivoordine"  =>  Field::int()->inlist(false),
           "numeroordine"   =>  Field::varchar(20)
       ];
    }

    function build(){

        $indirizzoSpedizione = ClienteSpedizione::findById($this->id_indirizzospedizione);
        $this->indirizzospedizione = $indirizzoSpedizione->formatToString();

        $this->stato = "placed";

    }

    static function getInstance($data)
    {
        $instance = parent::getInstance($data); // TODO: Change the autogenerated stub
        if( !empty($instance->id_coupon) ){
            $instance->coupon = Coupon::findById($instance->id_coupon);
        }

        if( !empty($instance->id_carrello)){


            if( $carrello = Carrello::findById($instance->id_carrello) ) {


                $carrello->buildCartFromDb();
                $instance->carrello = $carrello;
            }
        }

        return $instance;
    }


    function save()
    {
        parent::save();

        $id = $this->id;


        foreach ( $this->lineitems as $key=>$value){
            $lineitem = new OrdineLineItem($value);
            $lineitem->setOrder($this);
            $lineitem->save();
        }

    }


    function getNumeroOrdine(){
        //return Date("y").Date("m").str_pad($this->id, 4, '0', STR_PAD_LEFT);
        return $this->numeroordine;
    }

    function getShippingAddress(){
        if( !empty($this->id_indirizzospedizione ))
            return ClienteSpedizione::findById($this->id_indirizzospedizione);

        return null;
    }

    function getMetodoSpedizione()
    {
        return Spedizione::findById($this->id_metodospedizione);
    }
    function getIndirizzoSpedizione()
    {
        return ClienteSpedizione::findById($this->id_indirizzospedizione);
    }
    function getCliente()
    {
        return Cliente::findById($this->id_cliente);
    }
    function getMetodoPagamento()
    {
        return MetodoPagamento::findById($this->id_gateway);
    }


}