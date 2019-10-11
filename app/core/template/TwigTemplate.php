<?php

namespace core\template;

use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\Environment;
use core\services\ApplicationsService;
use core\services\Request;
use core\services\Response;
use core\template\TwigLoader;
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
        $this->twigloader = new TwigLoader();



        $tdd = $this->getTemplatesDirectory();



        if( is_array($tdd) ){

            foreach ($tdd as $item) {
                $this->twigloader->addPath($item);
            }
        }else{
            $this->twigloader->addPath($tdd);
        }

        $this->twigloader->addPath(   Environment::$ROOT."/applications");




        $twigOptions = [
            'cache' => $this->getCacheDir().'/cache',
            'auto_reload' => false
        ];
 
      
       
        if( !\applications\settings\entities\Setting::getValueOf("cache_templates",false) ){
            $twigOptions['auto_reload'] = true;
            $twigOptions['debug'] = true;
        }
   
        $this->twig = new \Twig_Environment($this->twigloader,$twigOptions);

        if(Environment::is(Environment::DEV)) {
            $this->twig->addExtension(new \Twig_Extension_Debug());
        }

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

        $this->twig->addFunction(new \Twig_Function("t",function(){
            return func_get_args()[0];
        }));



    }


    public function exists($template)
    {
        return $this->twigloader->exists($template);
    }

    public function render()
    {



        $ex = explode("/",$this->template);




        if (!$this->response || !$this->template) return false;

        if( isset($this->response['data']) && is_array($this->response['data'])  && isset($this->response['data']['type']) && $this->response['data']['type']=="redirect"){
            Response::go($this->response['data']['to']);
        }

        $pagina = false;

        $query = Request::getQuery();

        if ($query == "") $query = "/";
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

        $result = call_user_func_array($callable,$args);


        if( is_string($result)) return $result;
        list($template,$response) = $result;
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