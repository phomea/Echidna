<?php

namespace applications\blog\entities;

use core\Model;
use core\db\Field;


class Categoria extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::string()->editable()->setLabel("Nome categoria"),
            "slug"  =>  Field::text()->editable()->setTemplate("slug")->setTemplateVar("nome")->setLabel("Slug (utilizzato per costruire la url)"),
            "descrizione" => Field::text()->editable()->setTemplate("tinymce")->setLabel("Descrizione categoria"),
            "immagine" => Field::text()->editable()->setTemplate("media")->setLabel("Immagine di anteprima")
        ];
    }
}