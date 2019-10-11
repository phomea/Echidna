<?php
namespace applications\login\entities;

use applications\login\LoginApplication;
use core\db\Field;
use core\Events;
use Stripe\Event;

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
            "nome"   =>  Field::varchar(100)->editable()->setFieldsize("medium")->setPlaceholder("Il tuo nome")->setMaxlength(100),
            "cognome"    =>  Field::varchar(100)->editable()->setFieldsize("medium")->setPlaceholder("Il tuo cognome")->setMaxlength(100),
            "username"  =>  Field::varchar(20)->editable()->setPlaceholder("Inserisci username")->setFieldsize("medium")->setMaxlength(20),
            "password"   =>  Field::varchar(128)->inlist(false)->setPlaceholder("Inserisci password")->setTemplate("password")->setHint("Inserisci password per modificarla")->setMaxlength(20),
            "email"  =>  Field::varchar(128)->editable()->setPlaceholder("Inserisci Email")->setMaxlength(128),
            "created"    =>  Field::date()->inlist(false),
            "last_modified"  =>  Field::date()->inlist(false),
            /*
            "type"   =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar([
                [
                    "label"  =>  "Admin",
                    "value"  =>  self::ROLE_ADMIN
                ],
                [
                    "label"  =>  "Editor",
                    "value"  =>  self::ROLE_EDITOR
                ]
            ]),*/
            "type"  =>  Field::int()->editable()->setLabel("tipo")->setFieldsize("medium")->setTemplate("select")->setTemplateVar(UserRole::getForSelect("name","id")),
            "active" =>  Field::int()->setDefault(0)->inlist(false),
            "data_di_nascita"    =>  Field::date()->inlist(false),
            "profile_img"    =>  Field::varchar(512)->editable()->setTemplate("media")->inlist(false)->setLabel("Immagine"),
            "storia" =>  Field::text()->editable()->setTemplate("tinymce")->inlist(false),
            "sid"   =>  Field::varchar(512)
        ];
    }

    function update()
    {
        $r =  parent::update(); // TODO: Change the autogenerated stub


        if( LoginApplication::getUserLogged() ){
            $logged = LoginApplication::getUserLogged();
            if(  $logged->id == $this->id ){
                LoginApplication::setUserLogged($this);
            }
        }

        return $r;
    }


    function checkPermission( $permission ){
        if(Events::exists(Events::USER_CHECK_PERMISSION)){
            return Events::dispatch(Events::USER_CHECK_PERMISSION,$permission);
        }else{
            $userRole = empty($this->type) ? 0 : $this->type;

            $permission = RolePermission::query()->where("userrole_id=$userRole")->where('route="'.str_replace("\\","\\\\",$permission).'"')->getOne();

            if(!$permission){
                return true;
            }
            if($permission->isActive()){
                return true;
            }
        }


        return false;
    }

    function displayValue($key)
    {
        if($key == "type"){
            if( empty($this->$key) ){
                return "Nessuno";
            }
            $role = UserRole::findById($this->$key);
            return $role->name;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }


    /**
     * @return UserRole|bool
     */
    function getType(){
        return UserRole::findById($this->type);
    }
}