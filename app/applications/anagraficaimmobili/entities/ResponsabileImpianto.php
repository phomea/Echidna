<?php

namespace applications\anagraficaimmobili\entities;


use applications\login\entities\User;
use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Fornitore;

class ResponsabileImpianto extends Model{

    static function schema()
    {
        return array_merge( [

            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment e hidden?
            "idFornitore"  =>  Field::int()->editable()->setLabel("Gestore")->setTemplate("select")->setTemplateVar(Fornitore::getForSelect("nome_cognome","id"))->setFieldsize("medium"),

            "nome"  =>  Field::varchar(512)->editable()->setFieldsize("medium")->setMaxlength(100)->setPlaceholder("Inserisci il nominativo")->setLabel("Nominativo"),
            "cognome"  =>  Field::varchar(512)->inlist(false)->setFieldsize("medium")->setMaxlength(100)->setPlaceholder("Inserisci il cognome"),
            "email"  =>  Field::varchar(512)->editable()->setTemplate("email")->setFieldsize("medium")->setMaxlength(100)->setPlaceholder("Inserisci una email di contatto"),
            "recapito"  =>  Field::varchar(512)->editable()->setFieldsize("medium")->setMaxlength(100)->setPlaceholder("Inserisci un recapito telefonico"),

            "indirizzo"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Indirizzo e numero civico"),
            "cap"  =>  Field::varchar(512)->editable()->setTemplate("cap")->inlist(false)->setPlaceholder("CAP")->setFieldsize("small")->setMaxlength(5),
            "citta"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Inserisci città")->setFieldsize("medium")->setMaxlength(512),
            "provincia"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Provincia")->setFieldsize("small")->setMaxlength(2),
            "paese"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Inserisci nazione")->setFieldsize("medium")->setMaxlength(512),
            "codiceFiscale"  =>  Field::varchar(512)->editable()->setPlaceholder("Inserisci codice fiscale")->setFieldsize("medium")->setMaxlength(16)->setLabel("Codice Fiscale"),

            "attivo"  =>  Field::int()->inlist(false),
            //"user_id"   =>  Field::int()->editable()->setLabel("Utente")->setFieldsize("medium")->setTemplate("select")->setTemplateVar(User::getForSelect("username","id"))

        ],parent::schema() );
    }

    function displayValue($key)
    {
        switch ($key) {
            case "nome_cognome" :
                return $this->nome." ".$this->cognome;
            case "idFornitore":
                $f = Fornitore::findById($this->idFornitore);

                if ($f) {
                    return $f->user->nome . " " . $f->user->cognome;
                }
                break;
        }
        return parent::displayValue($key);
    }


}