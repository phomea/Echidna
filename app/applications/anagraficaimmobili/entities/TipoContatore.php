<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Fornitore;



class TipoContatore extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?
            "idFornitore"  =>  Field::int()->editable()->setLabel("Gestore")->setTemplate("select")->setTemplateVar(Fornitore::getForSelect("nome_cognome","id"))->setFieldsize("medium"),

            "nomeTipoContatore"  =>  Field::varchar(100)->editable()->setPlaceholder("Nome della tipologia di Contatore")->setMaxlength(100)->setLabel("Nome Tipo Contatore"),
            "modello"  =>  Field::varchar(100)->editable()->setPlaceholder("Modello del Contatore")->setFieldsize("medium")->setMaxlength(100),

            "is_global"  =>  Field::boolean()->editable()->inlist(true)->setTemplate("checkbox")->setLabel("Globale")->setHint("Rendere disponibile a tutti i Fornitori?"), //Da impostare automaticamente a 1 solo se supermegaadmin

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key) {

            case "idFornitore":
                $f = Fornitore::findById($this->idFornitore);

                if ($f) {
                    return $f->user->nome . " " . $f->user->cognome;
                }
                break;
            case "is_global":
                if ($this->is_global==1) {
                    return "Sì";
                }
                return "";
                break;
        }
        return parent::displayValue($key);
    }

}


