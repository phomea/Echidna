<?php

namespace applications\ecommerce\entities;


use applications\media\entities\AttachmentText;
use core\db\Field;
use core\Model;
use core\services\Db;
use core\services\Response;
use core\services\RouterService;

class Categoria extends Model{
    static function getTable()
    {
        return "ecommerce_categoria";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(256)->editable()->setHint("Nome della categoria, viene visualizzato nei menù e sul sito"),
            "slogan"         =>  Field::varchar(1024)->editable(),
            "slug"  =>  Field::varchar(64)->editable()->setTemplate("slug")->setTemplateVar("nome"),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea"),
            "padre"         =>  Field::int()->setDefault(-1),
            "immagine"  =>  Field::text()->editable()->setTemplate("media")

        ];
    }



    public function getImages(){
        $sql =  "SELECT * FROM ecommerce_categoria_immagine WHERE id_categoria=:id_categoria";

        return Db::$connection->fetchAll($sql,[
            "id_categoria"   =>  $this->id
        ]);
    }



}