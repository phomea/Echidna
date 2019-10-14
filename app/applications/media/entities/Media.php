<?php


namespace applications\media\entities;

use core\Model;
use core\db\Field;

/**
 * Class Contenuto
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
class Media extends Model {
    const ID = "id";
    const PERMALINK = "permalink";
    const PATH = "path";
    const DATA_CREAZIONE = "data_creazione";


    static function schema()
    {
        return[
            self::ID    =>  Field::primaryIndex()->unique(),
            self::PERMALINK  =>  Field::string(),
            self::PATH =>  Field::varchar( 100 ),
            self::DATA_CREAZIONE => Field::date(),

        ];
    }



    function render(){
        return '<img src="' . $this->permalink. '">';
    }
}