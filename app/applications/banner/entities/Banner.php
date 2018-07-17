<?php

namespace applications\banner\entities;

use core\Model;
use core\db\Field;

/**
 * Class Banner
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
class Banner extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "titolo"  =>  Field::string()->editable(),
            "tipo" =>  Field::string()->editable(),
            "link" => Field::text()->editable(),
            "contenuto" => Field::text()->editable(),
            "id_media" => Field::int()->editable()->setTemplate("media"),
            "hook" => Field::text()->editable(),
            "alt" => Field::text()->editable(),
        ];
    }
}