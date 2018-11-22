<?php
namespace applications\login\entities;

use core\db\Field;
class User extends \core\Model{
    const ROLE_ADMIN = "admin";
    const ROLE_EDITOR = "editor";


    static function getTable()
    {
        return "users";
    }

    static function schema()
    {
        return [
            "id"  =>  Field::primaryIndex(),
            "username"  =>  Field::varchar(20)->editable(),
            "password"   =>  Field::varchar(128),
            "email"  =>  Field::varchar(128)->editable(),
            "created"    =>  Field::date(),
            "last_modified"  =>  Field::date(),
            "type"   =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar([
                [
                    "label"  =>  "Admin",
                    "value"  =>  self::ROLE_ADMIN
                ],
                [
                    "label"  =>  "Editor",
                    "value"  =>  self::ROLE_EDITOR
                ]
            ]),
            "active" =>  Field::int()->setDefault(0),
            "nome"   =>  Field::varchar(256)->editable(),
            "cognome"    =>  Field::varchar(256)->editable(),
            "data_di_nascita"    =>  Field::date(),
            "profile_img"    =>  Field::varchar(512)->editable()->setTemplate("media"),
            "storia" =>  Field::text()->editable()->setTemplate("tinymce")

        ];
    }




}