<?php
namespace core;
global $echidna_config;

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


    static function getFile($n){

        /**
         * @var $frontendTemplate BaseTemplate
         */



        $return = [];


        if( file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php") )
            $return =  include dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php";
        else
            $return = [];


        $frontendTemplate = Response::$config['frontendTemplate'];
        if($frontendTemplate != null){
            $dir = $frontendTemplate::getBaseDirectory();

            if( file_exists($dir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR.$n.".php") ) {
                $add = include $dir . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . $n . ".php";
                $return = array_merge_recursive($return,$add);
            }


        }

        return $return;
    }

}
