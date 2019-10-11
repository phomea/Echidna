<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Fornitore;

class LayoutProspettoMillesimale extends Model{

    static function schema()
    {
        return [

            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment e hidden?
            "idFornitore"  =>  Field::int()->editable()->setLabel("Gestore")->setTemplate("select")->setTemplateVar(Fornitore::getForSelect("nome_cognome","id"))->setFieldsize("medium")->required(),

            "descrizione"  =>  Field::varchar(100)->editable()->setFieldsize("medium")->setHint("Nome per uso interno")->setMaxlength(100)->required()->setFieldsize("medium"),
            "logo"  =>  Field::varchar(512)->editable()->setTemplate("media")->inlist(false)->setLabel("Logo")->inlist(false),
            "altezzaLogo"  =>  Field::int()->editable()->setLabel("Altezza logo (in millimetri)")->setTemplate("int")->setFieldsize("small")->setHint("Lasciare vuoto per utilizzare tutto lo spazio consentito"),

            "colore"  =>  Field::varchar(20)->editable()->setTemplate("colorpicker")->setFieldsize("small")->setHint("In formato RGB - es: #6d93fa"),
            "font"  =>  Field::varchar(100)->editable()->setTemplate("select")->setTemplateVar([
                ["value" => "Times", "label" => "Times New Roman"],
                ["value" => "Arial", "label" => "Arial"],
                ["value" => "Courier", "label" => "Courier New"],
                ["value" => "Roboto", "label" => "Roboto"],
            ])->setFieldsize("medium")->setHint("Font da utilizzare nelle bollette"),

            "header_1"  =>  Field::text()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("textarea")->setLabel("Intestazione 1")->setHint("Testo mostrato in alto a destra in prima pagina: CONTATTI"),
            "header_2"  =>  Field::text()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("textarea")->setLabel("Intestazione 2")->setHint("Testo mostrato in alto a destra in prima pagina: EXTRA "),
            "header"  =>  Field::text()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("textarea")->setLabel("Frontespizio")->setHint("Testo mostrato in alto in ogni pagina"),
            "footer"  =>  Field::text()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("textarea")->setLabel("Pie di Pagina")->setHint("Testo mostrato in fondo ad ogni pagina"),

            "firma"  =>  Field::varchar(512)->editable()->setTemplate("media")->inlist(false)->setLabel("Firma PNG")->inlist(false),

            "nascondiServiziInutilizzati"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Nascondi Servizi Inutilizzati")->setPlaceholder("Nascondi")->setHint("Spunta il box per nascondere i servizi inattivi (CLI, CLE, ACS) dalla bolletta"),

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
        }
        return parent::displayValue($key);
    }
}