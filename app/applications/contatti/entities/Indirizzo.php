<?php
namespace applications\contatti\entities;

use core\db\Field;
use core\Model;

class Indirizzo extends Model {



    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::text()->editable(),
            "email" =>  Field::text()->editable()

        ];
        // TODO: Implement schema() method.
    }

}