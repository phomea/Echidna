<?php
namespace applications\settings\entities;

use core\db\Field;

class CustomTemplate extends \core\Model{
 
    static function schema()
    {
        return [
            "id"=>Field::primaryIndex(),
            "nome"   =>  Field::varchar("30")->editable(),
            "percorso" =>  Field::varchar(128)->editable(),
            "template"  =>  Field::text()->editable()->setTemplate("ace"),
           
        ]; // TODO: Change the autogenerated stub
    }


}