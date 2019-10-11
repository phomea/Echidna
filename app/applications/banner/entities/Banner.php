<?php

namespace applications\banner\entities;

use applications\banner\BannerApplication;
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
            "tipo" =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar(BannerApplication::getType()),
            "link" => Field::text()->editable(),
            "media" => Field::varchar(512)->editable()->setTemplate("media"),
            "hook" => Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar(BannerApplication::getPositions()),
            "alt" => Field::text()->editable(),
        ];
    }
}