<?php
namespace applications\faq\entities;

use core\db\Field;
use core\Model;

class FaqAnswer extends Model{
    static function schema()
    {
        return array_merge([
            "id"        =>  Field::primaryIndex(),
            "domanda"    =>  Field::varchar(256)->editable(),
            "risposta"  =>  Field::text()->editable()->setTemplate("tinymce"),
            "idFaq"     =>  Field::int()->editable()->setTemplate("hidden"),
            "_order" =>  Field::int()->inlist(false)
            ],parent::schema()); // TODO: Change the autogenerated stub
    }

}