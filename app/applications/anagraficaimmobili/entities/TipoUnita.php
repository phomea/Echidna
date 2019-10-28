<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;


class TipoUnita extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?

            "nomeTipologia"  =>  Field::varchar(255)->editable()->setLabel("Nome Tipologia")->setFieldsize("medium"),

			"tipoPerCalcolo"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
            	["label" => "Appartamento", "value" => 1],
                ["label" => "Fondo Commerciale", "value" => 2],
                ["label" => "Locale ad uso Collettivo", "value" => 3],
            ])->setFieldsize("small")->setLabel("Tipologie per Calcolo"),
            // ??? "unitaMisura"  =>  Field::varchar(255)->editable(),
            
            //campi da definire per utilità a livello di edificio

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){
            case "tipoPerCalcolo":
                switch ($this->tipoPerCalcolo){
                    case 1: return "Appartamento"; break;
                    case 2: return "Fondo Commerciale"; break;
                    case 3: return "Locale ad uso Collettivo"; break;
                    default: return "-";
                }
                break;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }



}

