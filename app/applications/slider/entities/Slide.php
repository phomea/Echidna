<?php

namespace applications\slider\entities;

use applications\media\entities\Media;
use core\Model;
use core\db\Field;

class Slide extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::string(),
            "titolo"  =>  Field::string(),
            "testo" =>  Field::string(),
            "link" => Field::text(),
            "link_text" => Field::text(),
            "hook" => Field::text(),
            "ordine" => Field::int(),
            "immagine" => Field::int(),
            "immagine_mobile" => Field::int(),

        ];
    }


    /**
     * @return Media
     */
    public function getImmagineMedia(){
        return Media::findById($this->getImmagine());
    }

    /**
     * @return Media
     */
    public function getImmagineMobileMedia(){
        return Media::findById($this->immagine_mobile);
    }
}