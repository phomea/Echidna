<?php
namespace core\services;
use core\abstracts\Service;
use core\template\BaseTemplate;

class Response extends Service {

    static public $config;

    static $templateToUse;

    static $response = [];
    static $template = "";

    static $mainResponse= [];


    public function setMeta($key,$value){
      $this->metas[$key] = $value;
    }

    public function addMeta($key,$value){
      $this->setMeta($key,$value);
    }

    public function renderMeta($p,$k){
      $m = $this->getMeta($p);
      echo $this->template_part("templates".DS."Meta".DS.$k,$m);

    }
    public function getMeta($key){
      if( !isset($this->metas[$key]) )
      return "";
      return $this->metas[$key];
    }

    static function getName(){
      return "response";
    }

    static function init(){
      parent::init();
    }




    public function replace($o){
      if(is_array($o)){
        if(isset($o['before'])){
          $this->before =$o['before'];
        }
        if(isset($o['content'])){
          $this->content =$o['content'];
        }
        if(isset($o['after'])){
          $this->after =$o['after'];
        }
      }else{
        $this->content =$o;
      }
    }


    public function gotContent(){
      return $this->content!='';
    }

    public function setHandler($o){
      $this->handler = $o;
    }

    public function template_part($a,$b=null){
      return $this->handler->template_part($a,$b);
    }


    public function render($c){
         ob_start();
         eval('?>'.$c);
         $out = ob_get_clean();
         $search = array(
             '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
             '/[^\S ]+\</s',     // strip whitespaces before tags, except space
             '/(\s)+/s',         // shorten multiple whitespace sequences
             '/<!--(.|\s)*?-->/' // Remove HTML comments
         );

         $replace = array(
             '>',
             '<',
             '\\1',
             ''
         );

         echo preg_replace($search, $replace, $out);
    }




    static function setTemplate( $t ){
        self::$template = $t;
    }

    static function addVariable( $response ){
        self::$response  = array_merge_recursive(self::$response,$response);
        //self::$response += $response;
    }

    static function add( $r ){
        self::setTemplate($r[0]);
        self::$mainResponse = $r[1];
        //self::addVariable($r[1]);
    }

    /**
     * @return BaseTemplate
     */
    static function getFrontendTemplate(){
        return new self::$config['frontendTemplate']( self::$template, self::$response );
    }

    /**
     * @param null $template
     * @param null $responsed
     * @param string $template_extend
     * @return BaseTemplate
     */
    static function getTemplateToUse($template = null, $response = false ,$template_extend = ""){

        if($template_extend!=""){
            $response['template_extend'] = $template_extend;
        }

        $mainResponse = true;
        if( $template == null ) $template = self::$template;
        if( $response===false ) {


            $response= self::$response + self::$mainResponse;
        }else{
            $response=  $response + self::$response;
            $mainResponse = false;
        }


        if($mainResponse && isset(Request::$headers[Request::AJAX_REQUEST_NAME])){
            self::setTemplateToUse("jsonTemaplate");
            $response = self::$mainResponse;
        }


        return new self::$config[self::$templateToUse]( $template , $response );
    }


    static function setTemplateToUse( $t ){
        self::$templateToUse = $t;
    }

    /**
     * @return BaseTemplate
     */
    static function getNewFrontendTemplate( $template,$response){
        return new self::$config[self::$templateToUse]( $template,$response );
    }

    static function redirect( $to ){
        return ["",["data"=>[
                "type"  =>  "redirect",
                "to"    =>  $to
            ]
            ]
        ];
    }
}
