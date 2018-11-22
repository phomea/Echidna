<?php

namespace frontend\consorzioleonardo\applications\imprese\entities;


use core\db\Field;
use core\Model;

class Impresa extends Model{
    static function schema()
    {
       return [
           "id" =>  Field::primaryIndex(),
           "nome"   =>  Field::varchar(512)->editable()->setLabel("Nome impresa")
       ];
    }

    static function getDescription()
    {
        return "Gestisci le imprese collegate al CRM.";
    }

}