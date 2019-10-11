<?php
namespace applications\pages\entities;


use core\db\Field;
use core\Model;

class ProvaInstall extends Model{
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "title"  =>  Field::string()->editable()->setTemplate("title"),
            "slug" =>  Field::varchar( 100 )->unique()->editable()->setTemplate("slug")->setTemplateVar("title"),
            "description" => Field::text()->editable(),
            "content"   =>  Field::text()->editable()->setTemplate("tinymce"),
            "layout"    => Field::text()->editable(),
            "prova" => Field::text()
        ];
    }
}