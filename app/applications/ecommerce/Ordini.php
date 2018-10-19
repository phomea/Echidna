<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Ordine;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Email;

class Ordini extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }

    static function ordini(){

        return [
            "ecommerce/templates/ordini",[]
        ];
    }

    static function getEntityClass()
    {
        return Ordine::class;
    }

    static function _previewEmail($params = []){


        $email = new Email();
        $email->from= "info";
        $email->to= "phomea@gmail.com";
        $email->template = $params['nome'];
        $email->subject ="Conferma ordine";

        $email->setData($params);
        $email->bindData();

        echo $email->message;


        exit;
    }

}