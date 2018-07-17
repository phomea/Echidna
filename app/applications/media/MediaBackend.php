<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\media;
use applications\banner\BannerApplication;
use applications\media\entities\Media;
use applications\media\MediaApplication;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Environment;
use core\Route;
use core\services\Response;
use core\template\JsonTemplate;

class MediaBackend extends BackendApplication {

    static function getRootpath(){
        return Environment::$ROOT."/media/";
    }
    static function getApplication()
    {
        return MediaApplication::class;
    }

    static function declareRoutes()
    {
        return array_merge(
            parent::declareRoutes(),
            [
                "media.upload"  =>  (new Route("","upload",[self::class,"upload"]))->method(Route::METHOD_POST),
                "media.filebrowser"  =>  (new Route("","filebrowser{folder:(.*)}",[self::class,"fileBrowser"]))
            ]
        );
    }

    static function actionAdd($params = [])
    {
        return["media/templates/add",[]];

    }

    static function upload( $params=[], $data ){

        $root = self::getRootpath();
        $folder = $_POST['folder'];

        $destinationFolder = $root.$folder;

        if(!file_exists($destinationFolder)){
            mkdir($destinationFolder,0777,true);
        }

        foreach ($_FILES as $key=>$value){
            move_uploaded_file( $value['tmp_name'],$destinationFolder."/".$value['name']);
        }
        exit;
    }


    static function fileBrowser( $params = []){

        $directory = self::getRootpath().$params['folder'];
        $l = array_diff(scandir(self::getRootpath().$params['folder']), array('..', '.'));

        $directories = [];
        $files = [];
        foreach ($l as $item) {

            if(is_dir( $directory . "/" . $item)){
                $directories[] = [
                    "name"  =>  $item,
                    "type"  =>  "dir"
                ];
            }elseif (is_file($directory . "/" . $item)){
                $files[] = [
                    "name"  =>  $item,
                    "type"  =>  "file"
                ];
            }
        }
        (new JsonTemplate("",[
            "data"=>[
                    "files" =>  $files,
                    "directories"   =>  $directories
            ]
        ]))->render();
        exit;
    }

}