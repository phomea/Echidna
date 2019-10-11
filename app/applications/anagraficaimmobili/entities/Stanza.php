<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\UnitaAbitativa;
use applications\anagraficaimmobili\entities\TipoStanza;

class Stanza extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?
            "idUnitaAbitativa"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(UnitaAbitativa::getForSelect("denominazione","id"))->setLabel("Unità Abitativa"),
            "idTipoStanza"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(TipoStanza::getForSelect("nomeTipoStanza","id"))->setLabel("Tipologia"),

            "codice"  =>  Field::varchar(30)->editable()->setPlaceholder("Codice univoco stanza")->setFieldsize("small")->setLabel("Codice Stanza")->setMaxlength(30)->required()->setHint("Se vuoto verrà generato dal sistema"),
            "nomeStanza"  =>  Field::varchar(100)->editable()->setLabel("Nome della Stanza")->setHint("Nome mnemonico identificativo della stanza")->setMaxlength(100)->setFieldsize("medium"),
            "caratteristiche"  =>  Field::varchar(255)->editable()->inlist(false)->setHint("Eventuali note")->setMaxlength(255),

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){
            case "idUnitaAbitativa":
                if( $this->idUnitaAbitativa ) {
                    $f = UnitaAbitativa::findById($this->idUnitaAbitativa);
                    if ($f) {
                        return $f->denominazione;
                    }
                }
                break;
            case "idTipoStanza":
                if( $this->idTipoStanza ) {
                    $f = TipoStanza::findById($this->idTipoStanza);
                    if ($f) {
                        return $f->nomeTipoStanza;
                    }
                }
                break;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }
}


