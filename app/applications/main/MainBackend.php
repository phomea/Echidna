<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\main;
use applications\login\LoginApplication;
use applications\main\entities\Widget;
use applications\main\widgets\WidgetCard;
use applications\main\widgets\WidgetFather;
use core\abstracts\Application;
use core\Model;
use core\Route;
use core\services\ApplicationsService;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;

class MainBackend extends \core\abstracts\BackendApplication{



    static function declareRoutes()
    {

        return [

            Widget::getEntity().".add"        =>  new Route("add",Widget::getAddLink(),[static::class,"actionAdd"]),
            Widget::getEntity().".mod"        =>  new Route("add","widget/".Widget::getModLink(),[static::class,"actionMod"]),
            Widget::getEntity().".delete"        =>  new Route("add",Widget::getModLink()."/remove",[static::class,"actionDelete"]),
            Widget::getEntity().".insert"        =>  (new Route("add",Widget::getAddLink(),[static::class,"actionInsert"]))->method(Route::METHOD_POST),
            Widget::getEntity().".list"        =>  new Route("add","lista",[static::class,"actionList"]),
            Widget::getEntity().".update"     =>  (new Route("update",Widget::getUpdateLink(),[static::class,'actionUpdate']))->method(Route::METHOD_PUT),

            "dashboard" =>  (new Route("dashboard","",[self::class,"dashboard"])),
            "widget.render" =>  (new Route("widget.render","widget/render/{id:([0-9]*)}",[self::class,"renderWidget"])),
            "backend.generic.list.entity"   =>  new Route("","listEntity",[self::class,"genericListEntity"]),
            "backend.performance.get"   =>   new Route("","get-performance-stats",[self::class,"_getPerformanceStats"])
        ];

        $r = parent::declareRoutes();

        $r["dashboard"] =  (new Route("dashboard","",[self::class,"dashboard"]));
        $r["widget.render"] =  (new Route("widget.render","widget/render/{id:([0-9]*)}",[self::class,"renderWidget"]));
        $r["backend.generic.list.entity"] =  new Route("","listEntity",[self::class,"genericListEntity"]);

        $r["backend.performance.get"] =  new Route("","get-performance-stats",[self::class,"_getPerformanceStats"]);


        var_dump($r);
        exit;
            return $r;
        exit;
        return array_merge( parent::declareRoutes(), [
            "dashboard" =>  (new Route("dashboard","",[self::class,"dashboard"])),
            "widget.render" =>  (new Route("widget.render","widget/render/{id:([0-9]*)}",[self::class,"renderWidget"])),
            "backend.generic.list.entity"   =>  new Route("","listEntity",[self::class,"genericListEntity"])
        ]);
    }



    static function _getPerformanceStats(){

        $stats = [
            "load"  =>  ServerStats::shapeSpace_system_load( ServerStats::shapeSpace_system_cores() ),
            "totalram"  =>  ServerStats::getTotalam(),
            "freeram"   =>  ServerStats::getFreeRam(),
            "disk"  =>  ServerStats::diskInfo(),
            "uptime"    =>  ServerStats::shapeSpace_server_uptime()
        ];

        echo json_encode($stats);
        exit;
    }


    static function genericListEntity( $params ){

        //var_dump(Widget::getEntityName());
        $entity = $params['entity'];
        $entityFound = null;

        foreach (ApplicationsService::$applications as $application){
            foreach($application::entities() as $ent){
                 if( $ent::getEntityName() == $entity ){
                     $entityFound = $ent;
                 }
            }
        }

       $route = RouterService::getRoute($entityFound::getEntity().".list" );

        RouterService::dispatchRoute($route,$params);

        $template = Response::getTemplateToUse();
        echo $template->render();
        exit;
    }

    static function renderWidget( $params = [] ){

        $widget = Widget::findById($params['id']);
        /**
         * @var $class WidgetFather
         */
        $class = $widget->class;
        $widget = $class::fromJson($widget->data);
        $widget->render();

        exit;
    }
    static function getApplication()
    {
        return MainApplication::class;
    }


    static function getWidgetsForUser(){
        $logged = SessionService::get(LoginApplication::LOGGER_USER);
        return Widget::findByUser( $logged->getId() );
    }

    static function getAvailableWidgets(){
        $widgetDisponibili = [];

        foreach ( ApplicationsService::getAll() as $item) {
            if( $item::getBackendApplication() !== null ) {
                foreach ($item::getBackendApplication()::declareWidgets() as $widget) {
                    $widgetDisponibili[] = new $widget();
                }
            }
        }
        return $widgetDisponibili;
    }

    static function dashboard(){



        $widgets = self::getWidgetsForUser();
        $widgetDisponibili = self::getAvailableWidgets();


        return ["main/templates/dashboard-widgets",
            [
                "widgets"   =>  $widgets,
                "widgetDisponibili"    =>  $widgetDisponibili
            ]
        ];
    }


    static function actionAdd( $params =[] ){

        $entity = static::getEntityClass();
        $widgetClass = $params['class'];

        $e = new $entity($params);
        $fields = static::generateFields($entity, $e);
        $fields = array_merge($fields,static::generateFields($widgetClass, $e ,"data"));

        Response::addVariable(
            [
                "title"         =>  "Aggiungi ".$entity::getEntityName(),
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ]
            ],true
        );

        return [
            "mod",[

                "data"  =>  $e ,
                "fields"    =>  $fields
            ]
        ];

    }

    static function actionInsert($params = [], $data = null)
    {
        parent::actionInsert($params, $data); // TODO: Change the autogenerated stub

        return Response::redirect(RouterService::$routes["dashboard"]->build());
    }

    static function actionDelete($params = [])
    {
        parent::actionDelete($params); // TODO: Change the autogenerated stub
        return Response::redirect(
            RouterService::getRoute("dashboard")->build()
        );
    }

    static function actionUpdate($params = [], $data = null)
    {

        parent::actionUpdate($params, $data); // TODO: Change the autogenerated stub

        return Response::redirect(
            RouterService::getRoute("dashboard")->build()
        );

    }


    static function actionMod( $params =[] ){
        $entity = static::getEntityClass();



        if( isset($params['id']) ) {
            $data = $entity::findById($params['id']);
        }else{
            $data = new $entity($params);
        }



        $widgetClass = $data->class;

        $widgetSchema = $widgetClass::schema();




        $fields = static::generateFields($entity, $data);
        $fields = array_merge($fields,static::generateFields($widgetClass, json_decode($data->data) ,"data"));


        Response::addVariable(
            [
                "title"         =>  "Modifica ".$entity::getEntityName(),
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ],
                "application_info"  =>  [
                    "icon"   =>  static::getIcon("actionMod"),
                    "title"   =>  static::getTitle("actionMod"),
                    "description"   =>  static::getDescription("actionMod")
                ]
            ]
        );

        return [
            "mod",[

                "data"  =>  $data,
                "fields"    =>  $fields,
                "entity"    =>  $entity

            ]
        ];

    }





}