<?php

namespace applications\slider\entities;

use applications\media\entities\Media;
use core\Model;
use core\db\Field;
use core\services\Request;

class Slide extends Model {
    static function schema()
    {
        return[
            "reference_description"   =>  Field::reference()->setTemplate("reference_text")->inlist(false)->editable()->setTemplateVar([
                "title" =>  "Modifica slide",
                "text"  =>   ""
            ]),
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::string()->editable(),
            "titolo"  =>  Field::string()->editable(),
            "testo" =>  Field::string()->editable(),
            "link" => Field::text()->editable(),
            "link_text" => Field::text()->editable(),

            "ordine" => Field::int()->editable(),
            "immagine" => Field::string()->editable()->setTemplate("media"),
            "immagine_mobile" => Field::string()->editable()->setTemplate("media"),
            "hook" => Field::text()->editable()->setHint("Utilizzo uno tra questi hook - ". implode(",",array_keys(Slider::getHooks()['positions'])) ),
            "_order"    =>  Field::int()->inlist(false)

        ];
    }

    public function getImageSrc(){
        if(Request::isMobile() && !empty($this->immagine_mobile)){
            return $this->immagine_mobile;
        }else{
            return $this->immagine;
        }
    }

}