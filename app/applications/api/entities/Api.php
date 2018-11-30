<?php

namespace applications\api\entities;

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
class Api extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::string()->editable(),
            "metodo" =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar([
                ["label"=>"GET","value"=>"GET"],
                ["label"=>"POST","value"=>"POST"],
                ["label"=>"PUT","value"=>"PUT"],
                ["label"=>"DELETE","value"=>"DELETE"]
            ]),
            "url"   =>  Field::text()->editable()->setHint("La base url parte da api/. Utilizza il formato {nome} per le variabili"),
            "query" =>  Field::text()->editable()->setHint("La query da chiamare. Utilizza il formato :nomevariabile per le variabili"),
            "tiporisposta"   =>  Field::varchar(128)->editable()->setTemplate("select")->setTemplateVar([
                ["label"=>"Oggetto ( corretto per select di 1 elemento)","value"=>"object"],
                ["label"=>"Array ( corretto per select di 1liste)","value"=>"array"]

            ]),
            "autenticazione"   =>  Field::varchar(128)->editable()->setTemplate("select")->setTemplateVar([
                ["label"=>"Libera","value"=>"libera"],
                ["label"=>"Token","value"=>"token"]

            ])
        ];
    }
}