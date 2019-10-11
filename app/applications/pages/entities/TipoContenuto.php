<?php
namespace applications\pages\entities;


use core\db\Field;
use core\Model;

class TipoContenuto extends Model{
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "nome"  =>  Field::string()->editable()->setTemplate("title"),
            "slug" =>  Field::varchar( 100 )->unique()->editable()->setTemplate("slug")->setTemplateVar("title"),
            "contenuto" =>  Field::text()->editable()->setTemplate("@custom/pages/templates/tipicontenuto.addtipo"),
            "template"  =>  Field::text()->editable()->setTemplate(("ace"))
        ];
    }
}