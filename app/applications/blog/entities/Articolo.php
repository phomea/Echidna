<?php

namespace applications\blog\entities;

use core\Model;
use core\db\Field;


class Articolo extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "titolo"  =>  Field::string()->editable()->setLabel("Titolo articolo"),
            "slug"  =>  Field::text()->editable()->setTemplate("slug")->setTemplateVar("titolo")->setLabel("Slug (definisce la url dell'articolo)"),
            "contenuto" => Field::text()->editable()->setTemplate("tinymce")->setLabel("Contenuto articolo"),
            "riassunto" => Field::text()->editable()->setTemplate("textarea")->setLabel("Riassunto"),
            "anteprima" => Field::text()->editable()->setTemplate("media")->setLabel("Immagine di anteprima"),
            "copertina" => Field::text()->editable()->setTemplate("media")->setLabel("Immagine di copertina"),
            "categoria_id"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Categoria::getForSelect("nome","id"))->setLabel("Categoria")
        ];
    }


    public function getCategoria(){
        return Categoria::findById($this->categoria_id);
    }
}