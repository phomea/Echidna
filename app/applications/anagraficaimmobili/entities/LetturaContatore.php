<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\LetturaAggregata;
use applications\anagraficaimmobili\entities\Contatore;
use applications\anagraficaimmobili\entities\Vettore;


class LetturaContatore extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "idLetturaAggregata"  =>  Field::int()->editable()->setLabel("Lettura Aggregata")->setTemplate("select")->setTemplateVar(LetturaAggregata::getForSelect("progressivo_data","id"))->setHint("File di Lettura Aggregata"),

            //Posso leggere dei contatori classici - oppure contatori speciali che si associano direttamente al vettore
            "idContatore"  =>  Field::int()->editable()->setLabel("Contatore")->setTemplate("select")->setTemplateVar(Contatore::getForSelect("codice","id"))->inlist(true),
            "idVettore"  =>  Field::int()->editable()->setLabel("Vettore Energetico")->setTemplate("select")->setTemplateVar(Vettore::getForSelect("descrizione","id"))->inlist(false),

            "tipoLettura"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Contatore", "value" => 1],
                ["label" => "Vettore", "value" => 2],
            ])->setFieldsize("small")->inlist(false),

            "dataLettura"  =>  Field::date()->editable()->inlist(true)->setTemplate("data")->setLabel("Data lettura del Dato")->setFieldsize("small"),

            "valoreLettura"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("small")->setLabel("Valore Lettura")->inlist(true),
            "deltaLettura"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("small")->setLabel("Delta Lettura")->inlist(true),

        ];
    }

    function displayValue($key)
    {
        switch ($key){

            case "idLetturaAggregata":
                if( $this->idLetturaAggregata ) {
                    $f = LetturaAggregata::findById($this->idLetturaAggregata);
                    if ($f) {
                        return $f->denominazione;
                        //return $f->progressivoLettura . " - " . date("d/m/Y", strtotime($f->dataLetturaFile));
                    }
                }
                break;
            case "idContatore":
                if( $this->idContatore ) {
                    $f = Contatore::findById($this->idContatore);
                    if ($f) {
                        return $f->codice;
                        //return $f->progressivoLettura . " - " . date("d/m/Y", strtotime($f->dataLetturaFile));
                    }
                }
                break;
            case "tipoLettura":
                if( $this->tipoLettura ){
                    switch($this->tipoLettura ){
                        case 1:
                            return "Contatore";
                            break;
                        case 2:
                            return "Vettore";
                            break;
                    }
                }
                break;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }
}


