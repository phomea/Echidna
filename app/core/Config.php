<?php
namespace core;
global $echidna_config;

use core\services\ApplicationsService;
use core\services\Response;
use core\template\BaseTemplate;

class Config
{
    public static $router;

    static function init($config){
        global $echidna_config;

        self::$router= new $config['router']();

        $echidna_config = $config;
    }


    static function getCoreFile($n){

         
        if( file_exists(Environment::$ROOT."/core/config/".$n.".php")){
            return include Environment::$ROOT."/core/config/".$n.".php";
        }
        return [];
    }
    static function getFile($n){

        /**
         * @var $frontendTemplate BaseTemplate
         */



        $return = [];
         

        if( isset(ApplicationsService::$config[$n]) ){
            $app = ApplicationsService::$config[$n];
            $e = explode("\\",$app);
            $path = implode("/",array_slice($e,0,-1));
            $configFile = Environment::$ROOT."/".$path."/config.php";
            if( file_exists( $configFile ) ){
                $return = include $configFile;
            }
            
        }


        if( file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php") ){
            $r =  include dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php";
            $return = array_merge_recursive($return,$r);
        }else
            $return = [];


        $frontendTemplate = Response::$config["templateEngines"]['frontendTemplate'];


        if($frontendTemplate != null){
            $dir = $frontendTemplate::getBaseDirectory();

            if( file_exists($dir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php") ) {
                $add = include $dir . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . $n . ".php";

                if( isset($add['overwrite'])){
                    return $add['overwrite'];
                }else{
                    $return = array_merge_recursive($return,$add);
                }
            }


        }

        return $return;
    }

}
