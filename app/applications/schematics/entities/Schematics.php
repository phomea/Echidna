<?php

namespace applications\schematics\entities;

use core\Model;
use core\db\Field;

/**
 * Class Schematics
 * @package models
 * @method int getId()
 * @method string getNome()
 * @method string getTesto()
 * @method \DateTime getData()
 * @method boolean isPassato()
 */
/**
 * @method int(10) unsigned getId()
 * @method varchar getTitle()
 * @method string getSlug()
 * @method string getDescription()
 * @method string getContent()
 * @method string getLayout()
 **/
class Schematics extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "DMVER"  =>  Field::varchar(3)->editable()->unique(),
            "vers" =>  Field::string()->editable(),
            "nome_file" => Field::string()->editable()->setTemplate("media"),
            /*
            "nome_file"  =>  Field::entity(AttachmentText::class,2)->editable()->setTemplate("select-multiple-images")->setLabel("Galleria immagini"),
            */
            "vista" => Field::varchar(1)->editable(),
            "sedute" => Field::float()->editable(),
        ];
    }
}

