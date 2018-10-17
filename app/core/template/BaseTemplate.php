<?php
namespace core\template;

abstract class BaseTemplate{

    public $response;

    public $template="";
    /**
     * BaseTemplate constructor.
     */
    public function __construct($template, $response )
    {
        $this->template = $template;
        $this->response = $response;
    }

    abstract static function getBaseDirectory();

    abstract public function render();

    static function reset(){

    }

    public function withVars( $template, $response){
        $this->template = $template;
        $this->response = $response;
        return $this;
    }
}