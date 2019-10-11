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
use core\db\DbPdo;
use core\Model;
use core\Route;
use core\services\ApplicationsService;
use core\services\Db;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;

class MainBackend extends \core\abstracts\BackendApplication{

    const DEMOMODE_KEY = "EchidnaDemo";
    const DEMOMODE_PRODUCTION_DB_DUMP_PATH = "/var/opt/therma/app/applications/main/demo/production.sql";
    const DEMOMODE_PRODUCTION_DB_READY_KEY =  "EchidnaDemo_ProductionDbReady";
    const DEMOMODE_DB_NAME_KEY = "EchidnaDemo_DbName";


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
            "backend.performance.get"   =>   new Route("","get-performance-stats",[self::class,"_getPerformanceStats"]),

            "backend.search"   =>   new Route("","search",[self::class,"_search"]),

            "demomode.toggle"   =>   new Route("","demomode/toggle",[self::class,"_demomode"]),

            "demomode.aftertoggle"   =>   new Route("","demomode/toggle/after",[self::class,"_demomodeAftertoggle"])

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


    static function demoMode(){
        return SessionService::get(static::DEMOMODE_KEY);
    }

    static function stopDemoMode(){
        SessionService::set(static::DEMOMODE_KEY,false);
    }

    static function startDemoMode(){
        if( SessionService::get(static::DEMOMODE_KEY) ){
            SessionService::set(static::DEMOMODE_KEY,false);
        }else{


 

            //docker exec therma_thermadb_1 /usr/bin/mysqldump -u root --password=pssrtcdn echidnadb > backup.sql
            //$r = shell_exec('mysqldump --user='.Db::$user.' --password='.Db::$password.' --host='.Db::$host.' '.Db::$db.' > '.__DIR__."/prova.sql");
            //shell_exec('docker exec '.$_ENV['DBCONTAINER_NAME'].' /usr/bin/mysqldump -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' echidnadb > '.self::DEMOMODE_PRODUCTION_DB_DUMP_PATH);
            
$r = shell_exec('docker exec '.$_ENV['DBCONTAINER_NAME'].' /usr/bin/mysqldump -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' echidnadb');

		file_put_contents(__DIR__."/demo/production.sql", $r);

		
            //__DIR__."/demo/production.sql
            //$_SESSION['EchidnaDemo_ProductionDb']

            SessionService::set(self::DEMOMODE_PRODUCTION_DB_READY_KEY,true);
            SessionService::set(static::DEMOMODE_KEY,true);
        }
    }



    static function _demomodeAftertoggle($params=[]){
        if(!isset($params['return_url'])){
            $params['return_url'] = RouterService::getRoute("dashboard")->build();
        }




        if(SessionService::get(self::DEMOMODE_PRODUCTION_DB_READY_KEY) ){


            $newDbName = "echidna_demo_".LoginApplication::getUserLogged()->id;

            $db = new DbPdo("mysql:host=".Db::$host, "root", $_ENV['MYSQL_ROOT_PASSWORD']);


 


            $stmt = $db->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$newDbName'");
            $dbexists = (bool) $stmt->fetchColumn();

            $r=null;

            if(!$dbexists) {
                $db->exec("CREATE DATABASE `$newDbName`; GRANT ALL ON `$newDbName`.* TO '" . Db::$user . "'@'%';FLUSH PRIVILEGES;") or die(print_r($db->errorInfo(), true));
                //$r = shell_exec('cat '.self::DEMOMODE_PRODUCTION_DB_DUMP_PATH.' | docker exec -i '.$_ENV['DBCONTAINER_NAME'].' /usr/bin/mysql -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' '.$newDbName.' 2>&1');
                $r = shell_exec('cat applications/main/demo/production.sql | docker exec -i '.$_ENV['DBCONTAINER_NAME'].' /usr/bin/mysql -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' '.$newDbName.' 2>&1');
            }


            //$r = shell_exec('cat '.self::DEMOMODE_PRODUCTION_DB_DUMP_PATH.' | docker exec -i therma_thermadbdemo_1 /usr/bin/mysql -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' echidnadb');





            if( !empty($r) ){

                die("Errore permessi");
            }


            SessionService::set(static::DEMOMODE_DB_NAME_KEY,$newDbName);

        }



        SessionService::delete(self::DEMOMODE_PRODUCTION_DB_READY_KEY);
        return Response::redirect($params['return_url']);
    }
    static function _demomode( $params = []){

        if(!isset($params['return_url'])){
            $params['return_url'] = RouterService::getRoute("dashboard")->build();
        }


        if( SessionService::get(static::DEMOMODE_KEY) ){
            SessionService::set(static::DEMOMODE_KEY,false);
        }else{
	
		$r = shell_exec("docker ps");

	
		 
            //docker exec therma_thermadb_1 /usr/bin/mysqldump -u root --password=pssrtcdn echidnadb > backup.sql
            //$r = shell_exec('mysqldump --user='.Db::$user.' --password='.Db::$password.' --host='.Db::$host.' '.Db::$db.' > '.__DIR__."/prova.sql");


		$r = shell_exec('docker exec '.$_ENV['DBCONTAINER_NAME'].' /usr/bin/mysqldump -u root --password='.$_ENV['MYSQL_ROOT_PASSWORD'].' echidnadb');

		file_put_contents(__DIR__."/demo/production.sql", $r);
		

            //__DIR__."/demo/production.sql
            //$_SESSION['EchidnaDemo_ProductionDb']

            SessionService::set(self::DEMOMODE_PRODUCTION_DB_READY_KEY,true);
            SessionService::set(static::DEMOMODE_KEY,true);
        }

        return Response::redirect(RouterService::getRoute("demomode.aftertoggle")->build([
            "return_url"=>$params['return_url']
        ]));
    }


    static function _search( $params = []){
        $s = $params['s'];
        $risultati = [];

        foreach (ApplicationsService::$applications as $app =>$value){

            if( !$value::getBackendApplication() ) continue;
            $rr  = $value::getBackendApplication()::search( $params );

            if( count($rr)>0){
                $risultati[$app] = [
                    "title"  =>  !empty($value::getBackendApplication()::getTitle()) ? $value::getBackendApplication()::getTitle() : $key,
                    "entity"    =>  $value::getEntityClass(),
                    "risultati" => $rr
                ];
            }
            /*$c = $value::getEntityClass();
            $db = Db::$connection;

            if( $c !== null ){

                $sql = "select *   from ".$c::getTable()." where 1=1 AND (";
                $where = [];
                $whereValues =[];

                foreach ($c::schema() as $key=>$value){
                    if( strpos($value->getData()["Type"],"int") !== false ){

                    }else{
                        $where[]="$key LIKE :$key";
                        $whereValues[$key]  = "%$s%";
                    }

                }

                $sql .= implode(" OR ",$where).")";



                $rr  = $db->fetchAll($sql,$whereValues);

                if( count($rr)>0){
                    $risultati[$app] = [
                        "entity"    =>  $c::getEntity(),
                        "risultati" => $rr
                    ];
                }
            }*/
        }


        return [
            "applications/main/templates/risultati-ricerca",[
                "ricerca"   =>  $s,
                "risultati" =>  $risultati
            ]
        ];
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


        $fields = array_merge($fields,static::generateFields($widgetClass, $e ,null,"data[%s]"));

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
        $fields = array_merge($fields,static::generateFields($widgetClass, json_decode($data->data) ,null,"data[%s]"));


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
