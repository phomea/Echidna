<?php
namespace core\template;

use core\Environment;
use core\services\Response;
use Twig_Loader_Filesystem;

class TwigLoader extends \Twig_Loader_Filesystem{
    public $extendedMode = false;
    protected function findTemplate($name, $throw = true)
    {


        /*if( $this->twigloader->exists($this->template.".twig") ){
            return $this->twig->render(
                $this->template.".twig",
                $this->response
            );
        }

        if(is_dir(Environment::$APPLICATION_ROOT."/".$ex[0])){
            if(Response::$templateToUse == "frontendTemplate"){
                $path = $ex[0]."/templates/frontend/";
                $this->twigloader->addPath(   Environment::$ROOT."/applications/".$path);

            }
        }*/

        $ex = explode("/",$name);


        $r = parent::findTemplate($name,false);


        if(!$r){
            $frontendtemplate = Response::getFrontendTemplate();

            if(is_dir( $frontendtemplate::getBaseDirectory()."/applications/".$ex[0])){
                $path = $ex[0];


                $this->addPath(   $frontendtemplate::getBaseDirectory()."/applications/".$path);
            }

            if(is_dir(Environment::$APPLICATION_ROOT."/".$ex[0])){
                if(Response::$templateToUse == "frontendTemplate"){
                    $path = $ex[0]."/templates/frontend/";


                    $this->addPath(   Environment::$ROOT."/applications/".$path);

                }
            }
        }else{
            return $r;
        }





        array_shift($ex);
        $name = implode("/",$ex);

        return parent::findTemplate($name,true);
    }

    public function setExtendedMode( $e = true){
        $this->extendedMode = $e;
    }


}