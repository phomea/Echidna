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
use core\Route;
use core\services\ApplicationsService;
use core\services\Response;
use core\services\SessionService;

class MainBackend extends \core\abstracts\BackendApplication{



    static function declareRoutes()
    {
        return [
            "dashboard" =>  (new Route("dashboard","",[self::class,"dashboard"])),
            "widget.render" =>  (new Route("widget.render","widget/render/{id:([0-9]*)}",[self::class,"renderWidget"]))
        ];
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


        //$widgets[] = Response::getTemplateToUse("main/widgets/views/widget_card",[])->render();

        /*
        $widgets[] = new WidgetCard();


        $widgetDisponibili = [];

        foreach ( ApplicationsService::getAll() as $item) {
            if( $item::getBackendApplication() !== null ) {
                foreach ($item::getBackendApplication()::declareWidgets() as $widget) {
                    $widgetDisponibili[] = new $widget();
                }
            }
        }*/

        return ["main/templates/dashboard",
            [
                "widgets"   =>  $widgets,
                "widgetDisponibili"    =>  $widgetDisponibili
            ]
        ];
    }
}