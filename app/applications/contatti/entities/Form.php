<?php
namespace applications\contatti\entities;

use core\Config;
use core\db\Field;
use core\Environment;
use core\Model;
use core\services\RouterService;

class Form extends Model {

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::text()->editable(),
            "tipo"  =>  Field::text()->editable(),
            //"indirizzo" =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Indirizzo::getForSelect("nome","id")),

            "to_email"  =>  Field::text()->editable()->setTemplate("select")->setTemplateVar(self::getSystemAccounts("to")),
            "from_email"  =>  Field::text()->editable()->setTemplate("select")->setTemplateVar(self::getSystemAccounts("from")),
            "redirect"  =>  Field::text()->editable()
        ];
        // TODO: Implement schema() method.
    }

    static function getSystemAccounts($t){
        $config = Config::getFile("email");
        $accounts = $config['accounts'];

        $r = [];

 
        foreach ($accounts as $key=>$account){
            $r[] = [
                "label" =>  $key." - ".$account[$t],
                "value" =>  $key
            ];
        }

        return $r;
    }


    function expand(){
        //$this->contatto = Indirizzo::findById($this->indirizzo);
        $this->action = RouterService::getRoute("frontend.contatti.form.send")->build();
    }
}