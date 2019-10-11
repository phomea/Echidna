<?php
namespace applications\faq\entities;

use applications\pages\entities\Pagina;
use core\db\Field;
use core\Model;

class Faq extends Model{
    static function schema()
    {
        return array_merge(
            [
                "id"    =>  Field::primaryIndex(),
                "nome"  =>  Field::varchar(128)->editable(),
                "titolo"    =>  Field::varchar(128)->editable(),
                "descrizione"   =>  Field::varchar(256)->editable()->setTemplate("textarea"),
                "id_pagina"  =>  Field::int()->editable()->inlist(true)->setTemplate("select-entity")->setTemplateVar(function() {
                    return [
                        "list" => Pagina::getForSelect("title", "id")(),
                        "entity" => Pagina::class,
                        "fieldlabel" => "title",
                        "fieldid" => "id"
                    ];
                })
            ],
            parent::schema()
        );
    }


    public function expand()
    {
        parent::expand(); // TODO: Change the autogenerated stub

        $this->answers = FaqAnswer::query()->where("idFaq=".$this->id)->getAll();
    }

}