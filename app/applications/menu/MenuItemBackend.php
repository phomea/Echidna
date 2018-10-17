<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\menu;
use applications\banner\BannerApplication;
use applications\menu\entities\Menu;
use applications\menu\entities\MenuItem;
use core\abstracts\Application;
use core\services\Response;
use core\services\RouterService;

class MenuItemBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return MenuApplication::class;
    }

    static function getEntityClass()
    {
        return MenuItem::class;
    }

    static function actionInsert( $params = [] , $data = null){


        $r = parent::actionInsert($params,$data);


        return Response::redirect(RouterService::$routes[Menu::class.".mod"]->build(['id'=> $r[1]['data']['data']->id_menu ]),$r[1]['data']['data']);
    }

    static function actionDelete( $params =[]){
        $entity = static::getEntityClass();

        $mi = $entity::findById($params['id']);

        $idmenu = $mi->id_menu;

        $mi->remove();

        RouterService::getRoute(Menu::class.".mod")->go(["id"=>$idmenu]);
    }

    static function actionUpdate( $params = [] , $data = null){
        $r = parent::actionUpdate($params,$data);
        return Response::redirect(RouterService::$routes[Menu::class.".mod"]->build(['id'=> $r[1]['data']->id_menu ]));
    }



}