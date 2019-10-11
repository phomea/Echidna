<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;


class TipoStanza extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?

            "nomeTipoStanza"  =>  Field::varchar(100)->editable()->setLabel("Nome Tipologia Stanza")->setMaxlength(100)->setFieldsize("medium")->setPlaceholder("Denominazione Tipologia Stanza"),

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

}


