<?php
namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;

class ClienteSpedizione extends Model{
    static function getTable()
    {
        return "ecommerce_cliente_spedizione";
    }


    static function schema()
    {
        return [
            "id"        =>  Field::primaryIndex(),
            "nome"      =>  Field::varchar(512),
            "cognome"   =>  Field::varchar(512),
            "via"       =>  Field::varchar(512),
            "numero"    =>  Field::varchar(64),
            "id_zona"   =>  Field::int(),
            "id_provincia"  =>  Field::int(),
            "id_cliente"    =>  Field::int(),
            "citta"     =>  Field::varchar(512),
            "cap"       =>  Field::varchar(12),
            "paese"     =>  Field::varchar(512)
        ];
    }




    function formatToString(){


        if($this->id_provincia) {
            $provincia = Provincia::findById($this->id_provincia);
            return $this->nome . " " . $this->cognome . ", " . $this->via . " " . $this->numero . "," . $this->citta . " (" . $provincia->name . ") " . $this->cap;
        }else{

            $zona = Zona::findById($this->id_zona);
            return $this->nome . " " . $this->cognome . ", " . $this->via . " " . $this->numero . "," . $this->citta . " (" . $zona->name . " ".$this->paese.") " . $this->cap;
        }
    }

    function getCountryCode(){
        $provincia = Provincia::findById($this->id_provincia);
        $country = Country::findById($provincia->id_country);

        return $country->iso_code;
    }


    function getProvincia(){
        return Provincia::findById($this->id_provincia);
    }
}