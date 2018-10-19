<?php

namespace core\template;

use applications\pages\entities\Pagina;
use core\services\Request;
use core\services\Response;
use Twig_Extension_StringLoader;

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
        $this->twig->addExtension(new Twig_Extension_StringLoader());
        $this->twig->addFilter( new \Twig_SimpleFilter('cast_to_array', function ($stdClassObject) {
            $response = array();
            foreach ($stdClassObject as $key => $value) {
                $response[] = array($key, $value);
            }
            return $response;
        }));


        $this->twig->addFilter( new \Twig_SimpleFilter('price', function ( $p ) {
            return Response::formatPrice($p);
        }));



        $this->twig->addTest(new \Twig_Test('string',function($value){
            return is_string($value);
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


        if( isset($this->response['data']) && is_array($this->response['data'])  && isset($this->response['data']['type']) && $this->response['data']['type']=="redirect"){
            Response::go($this->response['data']['to']);
        }

        $query = Request::getQuery();
        if($query == "" ) $query = "/";
        $pagina = Pagina::findRawBySlug($query);

        if($pagina)
            $this->response['meta'] = $pagina->getMeta();


        $this->response["current_url"] = Request::getCurrentUrl();


        return $this->twig->render(
            $this->template.".twig",
            $this->response
        );
    }

    static function renderFunction($callable,$args = []){


        list($template,$response) = call_user_func_array($callable,$args);
        $r =  new \Twig_Markup( Response::getNewFrontendTemplate( $template,$response)->render() , "utf-8" );
        return $r;
    }
    public function addFunction( $name, $callable ){


        $this->twig->addFunction(new \Twig_Function($name,function() use ($callable){

            $args = func_get_args();

            return static::renderFunction($callable,$args);
        } ,
            array(
                'pre_escape' => 'html',
                'is_safe' => array('html')
            )
        ));
    }


    abstract function getTemplatesDirectory();

    function getCacheDir(){
        return (is_array($this->getTemplatesDirectory()) ? $this->getTemplatesDirectory()[0] : $this->getTemplatesDirectory())."/cache";
    }
}