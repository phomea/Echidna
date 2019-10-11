<?php
namespace core;
use controllers\BaseController;
use core\services\EmailService;
use core\services\Response;
use core\template\BaseTemplate;

class Email {
    public $from;
    public $to;
    public $subject;
    public $data=[];
    public $template;

    public $message;
    public $attachments = [];


    function addAttachment( $path ){
        $this->attachments[] = $path;
    }

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
            $t,
            $this->attachments
        );

    }

    function setData( $d ){
        $this->data = $d;
    }

    /**
     * @param BaseTemplate $templateEngine
     * @return mixed
     */
     function bindData( $templateEngine = null){



        if($templateEngine==null) {
            Response::$templateToUse = "frontendTemplate";
            $this->message = Response::getTemplateToUse("emails/" . $this->template, $this->data)->render();
        }else{
            $this->message = $templateEngine->withVars($this->template,$this->data)->render();
        }



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
