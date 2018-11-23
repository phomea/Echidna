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
                "media.filebrowser"  =>  (new Route("","filebrowser{folder:(.*)}",[self::class,"fileBrowser"])),
                "media.movefile"  =>  (new Route("","moveFile",[self::class,"moveFile"]))->method(Route::METHOD_POST),
                "media.makeDir"  =>  (new Route("","makeDir",[self::class,"makeDir"]))->method(Route::METHOD_GET),
                "media.delete"  =>  (new Route("","delete",[self::class,"delete"]))->method(Route::METHOD_GET)
            ]
        );
    }


    static function delete($params){
        $path = Environment::$ROOT."/media" . $params['path'];

        unlink($path);
        exit;
    }

    static function makeDir( $params ){

        $old = umask(0);
        @mkdir(Environment::$ROOT."/media".$params['dir'],0777,true);
        umask($old);
        exit;
    }
    static function moveFile($params,$data){

        $from = Environment::$ROOT."/media" . $data['from'];
        $to     = Environment::$ROOT."/media".$data['to'];
        if(is_file($from)){
            $to .= "/".basename($from);
            rename($from,$to);
        }
        exit;
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