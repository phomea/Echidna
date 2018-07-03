<?php
namespace core;
use controllers\BaseController;
use core\services\EmailService;

class Email {
    public $from;
    public $to;
    public $subject;
    public $data;
    public $template;



    function send(){

        //$t = $this->getTemplate($this->template);



        $this->data['data_richiesta'] = date("d/m/y G:i");

        /*foreach ($this->data as $key => $value) {
          $t = str_replace("{{".$key."}}",$value,$t);
        }*/

        $t = $this->bindData();


        return (new EmailService())->send(
            $this->from,
            $this->to,
            $this->subject,
            $t);

    }


     function bindData(){






        $this->message = BaseController::getTwig()->render("emails/".$this->template.".twig",$this->data);



        /*

        foreach ($data as $key => $value) {


            if(!is_array($value)) {


                $t = str_replace("{{" . $base . $key . "}}", $value, $t);
            }



            if(is_array($value)){


                $t = static::bindData($value,$t,$base . $key .".");


            }
        }
        */

        return $this->message;

    }



    function getTemplate($template){



        global $echidna;
        $path = $echidna->template_path . DS . "templates". DS .static::getEntityName().DS. $template . ".php";

        return file_get_contents($path);
    }



}
