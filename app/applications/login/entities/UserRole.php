<?php
namespace applications\login\entities;

use core\db\Field;
use core\Model;

class UserRole extends Model{
    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "name"  =>  Field::varchar(512)->editable()->setLabel("Nome Tipologia"),
            "slug"  =>  Field::varchar(50)->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Super Admin", "value" => "super_admin"],
                ["label" => "Amministratore del Sistema", "value" => "admin"],
                ["label" => "Gestore dei Servizi", "value" => "fornitore"],
                ["label" => "Amministratore di Condominio", "value" => "amministratore_condominio"],
                ["label" => "Proprietario Immobile", "value" => "proprietario_immobile"],
                ["label" => "Utente demo", "value" => "utente_demo"],
            ])
        ];
    }

}