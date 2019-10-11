<?php 
namespace applications\redirects\entities;

use core\db\Field;
use core\Model;

class Redirect extends Model{
    static function schema()
    {
        return array_merge(parent::schema(),[
            "id"    =>  Field::primaryIndex(),
            "nome"   => Field::varchar(200)->editable(),
            "regex"  =>  Field::varchar(200)->editable()->index(),
            "url"    =>  Field::text()->editable(),
            "type"  =>  Field::text()->editable()
        ]);
    }
}