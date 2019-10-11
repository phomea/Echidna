<?php
namespace applications\utilities;


use core\abstracts\BackendApplication;
use core\Environment;
use core\Route;
use core\services\Db;
use core\services\Request;
use core\services\RouterService;

class UtilitiesBackend extends BackendApplication{
    static function getApplication()
    {
        return UtilitiesApplication::class;
    }


    static function declareRoutes()
    {
        return array_merge(
            parent::declareRoutes(),
            [
                "backend.utilities.ftp" => new Route("","ftp",[static::class,"actionFtp"]),
                "backend.utilities.ftp.save" => (new Route("","ftp",[static::class,"actionFtp"]))->method(Route::METHOD_POST),
                "backend.utilities.phpmyadmin" => new Route("","phpmyadmin",[static::class,"actionPhpmyadmin"]),
                "backend.utilities.phpmyadmin.save" => (new Route("","phpmyadmin",[static::class,"actionPhpmyadmin"]))->method(Route::METHOD_POST),
            ]
        );
    }


    static function actionFtp($params=[], $post=[]){

        if( Request::isPost() ){

            $rootFTP = Environment::$ROOT;
            $r = shell_exec("docker inspect therma_thermaweb_1");
            $r = json_decode($r)[0]->Mounts;
            foreach ($r as $value){
                if($value->Destination=="/var/www/html"){
                    $rootFTP = $value->Source;
                }
            }
            $dockerCommand = "";
            switch ($post['operazione']){
                case "avvia" :
                    $dockerCommand = 'docker run -d --rm --name ftp -p 21:21 -p 30000-30009:30000-30009 -e "PUBLICHOST=localhost" -e "FTP_USER_NAME='.$post['username'].'" -e "FTP_USER_PASS='.$post['password'].'" -e "FTP_USER_HOME=/home/'.$post['username'].'" -v '.$rootFTP.':/home/'.$post['username'].'  stilliard/pure-ftpd';
                    break;

            }


            shell_exec("docker stop ftp");


            if(!empty($dockerCommand)){
                $r = shell_exec($dockerCommand." 2>&1");

            }


            RouterService::getRoute("backend.utilities.ftp")->go();
            exit;
        }else {
            $r = shell_exec("docker inspect ftp");
            $r = json_decode($r);
            if(!empty($r)){
                return [
                    "applications/utilities/templates/ftp", [
                        "status"    =>  1
                    ]
                ];
            }
            return [
                "applications/utilities/templates/ftp", [
                    "status" => 0
                ]
            ];
        }

    }

    static function actionPhpmyadmin($params=[], $post=[]){
        if( Request::isPost() ){



            $dockerCommand = "";
            switch ($post['operazione']){
                case "avvia" :
                    $dockerCommand = 'docker run -d --rm --name phpmyadmin --network=therma_default --link thermadb:mysql -p 8181:80 -e "MYSQL_USERNAME='.Db::$user.'" -e "MYSQL_PASSWORD='.Db::$password.'" -e "MYSQL_PORT_3306_TCP_ADDR=thermadb" -e "MYSQL_ROOT_PASSWORD='.$_ENV['MYSQL_ROOT_PASSWORD'].'" corbinu/docker-phpmyadmin';
                    break;


            }





            shell_exec("docker stop phpmyadmin");


            if(!empty($dockerCommand)){
                $r = shell_exec($dockerCommand." 2>&1");



            }


            RouterService::getRoute("backend.utilities.phpmyadmin")->go();
            exit;
        }else {
            $r = shell_exec("docker inspect phpmyadmin");
            $r = json_decode($r);
            if(!empty($r)){
                return [
                    "applications/utilities/templates/phpmyadmin", [
                        "status"    =>  1
                    ]
                ];
            }
            return [
                "applications/utilities/templates/phpmyadmin", [
                    "status" => 0
                ]
            ];
        }
    }
}