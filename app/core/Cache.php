<?php
namespace core;

use core\services\Db;

class Cache{


    static function normalizeEntity($e){
        return str_replace("\\", "-",$e);
    }


    static function clear($entita){
        global $echidna;
        $path = dirname(__DIR__).DS."cache";
        $entita = static::normalizeEntity($entita);


        if(file_exists($path.DS."query".DS.$entita)){
            $files = glob($path.DS."query".DS.$entita."/*"); // get all file names



            foreach($files as $file){ // iterate files
                if(is_file($file))
                    unlink($file); // delete file

            }
        }


    }
    static function status($entita, $chiave, $maxage=0){
        if(Environment::is(Environment::DEV)) return false;

        //if( !\applications\settings\entities\Setting::getValueOf("cache_queries",false) ) return false;

        global $echidna;
        $path = Environment::$CACHE_ROOT;
        $md=md5($chiave);

        $entita= self::normalizeEntity($entita);





        if( !file_exists($path.DS."query".DS.$entita.DS.$md)){
            return false;
        }



        if($maxage > 0 && time()-filemtime($path.DS."query".DS.$entita.DS.$md) > $maxage){
            return false;
        }



        return true;
    }

    static function set($entita, $chiave,$value){
       if(Environment::is(Environment::DEV)) return;
       //if( !\applications\settings\entities\Setting::getValueOf("cache_queries",false) ) return;

        $path = Environment::$CACHE_ROOT;
        $md=md5($chiave);




        $entita= self::normalizeEntity($entita);

        if (!file_exists($path )) {
            mkdir($path );
        }

        if (!file_exists($path . DS . "query")) {
            mkdir($path . DS . "query");
        }
        if (!file_exists($path . DS . "query" . DS . $entita)) {
            mkdir($path . DS . "query" . DS . $entita);
        }

        $r = file_put_contents($path . DS . "query" . DS . $entita . DS . $md, '<?php return /* ' . $chiave . ' */ ' . var_export($value, true) . ';?>');

    }

    static function get($entita, $chiave, $maxage=0){
       if(Environment::is(Environment::DEV)) return null;
       //if( !\applications\settings\entities\Setting::getValueOf("cache_queries",false) ) return null;

        $entita= self::normalizeEntity($entita);

        $path = Environment::$CACHE_ROOT;
        $md=md5($chiave);
        $entita= self::normalizeEntity($entita);
        if( !self::status($entita, $chiave,$maxage) ) return null;



        return include $path . DS . "query" . DS . $entita . DS . $md;

    }




    static function cache_result($pathToCache, $content, $query = "")
    {

        $path = Environment::$CACHE_ROOT;
        if (!file_exists($path . DS . "query"))
            mkdir($path . DS . "query");
        if (!file_exists($path . DS . "query" . DS . $this->name))
            mkdir($path . DS . "query" . DS . $this->name);

        file_put_contents($path . DS . "query" . DS . $this->name . DS . $pathToCache, '<?php return /* ' . $query . ' */ ' . var_export($content, true) . ';?>');
    }

}
