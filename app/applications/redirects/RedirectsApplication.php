<?php 
namespace applications\redirects;

use applications\redirects\entities\Redirect;
use backend\Menu;
use core\abstracts\Application;
use core\Events;
use core\services\Response;
use core\services\RouterService;

class RedirectsApplication extends Application{

    static function init($n)
    {
 
        parent::init($n);
 
        $menu = new Menu("Redirects",self::getBackendApplication()::getIcon());
        $menu->addItem("Lista",RouterService::getRoute(Redirect::getEntity().".list"));
        $menu->addItem("Aggiungi",RouterService::getRoute(Redirect::getEntity().".add"));

        $backend = Response::getBackendTemplate();
        $backend::addMenu($menu);

        Events::add(Events::ROUTER_PARSEQUERY_BEFORE,function($query){
           /*$redirects = Redirect::query()->getAll();


           foreach($redirects as $key=>$value){

             
               if(preg_match("/".$value->regex."/",$query,$matches)){
                   var_dump($matches);
                   exit;
               }
           }

           exit;*/
            $r = Redirect::query()->
                where('regex="'.$query.'"')
                ->getOne();

            if($r){
                Response::go($r->url,$r->type);
            }
            
            return [$query];
        });
    }
    static function getBackendApplication()
    {
        return RedirectsBackend::class;
    }
    static function getEntityClass()
    {
        return Redirect::class;
    }

    static function getFrontendApplication()
    {
        return null;
    }

}