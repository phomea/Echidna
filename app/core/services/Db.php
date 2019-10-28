<?php
namespace core\services;

use applications\main\MainBackend;
use core\abstracts\Service;
use core\db\DbPdo;

class Db extends Service {

    static $version=null;

    static $host;
    static $db;
    static $user;
    static $password;

    /**
     * @var DbPdo
     */
    static $connection = null;

    static function getVersion(){
        $r = self::$connection->fetchOne("SELECT * from settings WHERE setting_key = 'echidna.version'");
        if($r){
            return $r['setting_value'];
        }
        return false;
    }
    static function init()
    {
        parent::init(); // TODO: Change the autogenerated stub


        try {
            $host   =  isset($_ENV["MYSQL_HOST"]) ? $_ENV['MYSQL_HOST'] : self::$config['host'];

            /*if( SessionService::get(MainBackend::DEMOMODE_KEY) ) {
                $host .= "demo";

            }*/

            self::$host = $host;
            self::$db = $db     =   isset($_ENV['MYSQL_DATABASE']) ? $_ENV['MYSQL_DATABASE'] : self::$config['db'];

            if( SessionService::get(MainBackend::DEMOMODE_KEY) ) {
                if ($d = SessionService::get(MainBackend::DEMOMODE_DB_NAME_KEY)) {

                    self::$db = $db = $d;

                }
            }


            self::$user = $user   =   isset($_ENV['MYSQL_USER']) ? $_ENV['MYSQL_USER'] : self::$config['user'];
            self::$password = $password=  isset($_ENV['MYSQL_PASSWORD']) ? $_ENV['MYSQL_PASSWORD'] : self::$config['password'];

            // stringa di connessione al DBMS
            self::$connection = new DbPdo("mysql:host=$host;dbname=$db", $user, $password);
            self::getVersion();
        }
        catch(\PDOException $e)
        {


            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Location: /install");
            exit;

        }
    }

    static function getName()
    {
        return "db";
    }


    /**
     * @return DbPdo
     */
    static function getInstance(){
        return self::$connection;
    }

    static function tableExists( $table ){
        $query = "SHOW TABLES LIKE '".$table."';";
        $r = static::getInstance()->query($query)->fetchAll();
        return count($r) > 0;
    }




}