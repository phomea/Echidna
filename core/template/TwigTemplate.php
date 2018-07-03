<?php

namespace core\template;

use core\services\Request;

abstract class TwigTemplate extends BaseTemplate {

    /**
     * @var \Twig_Environment
     */
    public $twig;

    /**
     * @var \Twig_Loader_Filesystem
     */
    public $twigloader;

    /**
     * TwigTemplate constructor.
     */
    public function __construct( $template,$response )
    {
        parent::__construct($template, $response );
        $this->twigloader = new \Twig_Loader_Filesystem();



        $tdd = $this->getTemplatesDirectory();

        if( is_array($tdd) ){

            foreach ($tdd as $item) {
                $this->twigloader->addPath($item);
            }
        }else{
            $this->twigloader->addPath($tdd);
        }



        $this->twig = new \Twig_Environment($this->twigloader, array(
            'cache' => $this->getCacheDir().'/cache',
            'auto_reload' => true,
            'debug' => true,
        ));




        $this->twig->addExtension(new \Twig_Extension_Debug());

        $this->twig->addFilter( new \Twig_SimpleFilter('cast_to_array', function ($stdClassObject) {
            $response = array();
            foreach ($stdClassObject as $key => $value) {
                $response[] = array($key, $value);
            }
            return $response;
        }));




        /*
        $twigFunction = new \Twig_SimpleFunction('CLCatalog', function($method,$var) {
            return \models\CL\CLCatalog::$method($var);
        });
        $twig->addFunction($twigFunction);
        */
    }

    public function render()
    {

        $this->response["current_url"] = Request::getCurrentUrl();
        return $this->twig->render(
            $this->template.".twig",
            $this->response
        );
    }

    abstract function getTemplatesDirectory();

    function getCacheDir(){
        return (is_array($this->getTemplatesDirectory()) ? $this->getTemplatesDirectory()[0] : $this->getTemplatesDirectory())."/cache";
    }
}