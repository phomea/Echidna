<?php

namespace applications\newsletter;

use applications\newsletter\entities\NewsletterUtente;
use core\abstracts\FrontendApplication;
use core\Route;
use core\services\Response;

class NewsletterFrontend extends FrontendApplication{
    static function declareRoutes()
    {
        return [

            "frontend.newsletter.iscrivi"  =>  (new Route("pagina","/iscrivi-newsletter",[self::class,"iscriviNewsletter"]))->method(Route::METHOD_POST)
        ];
    }

    static function iscriviNewsletter( $params = [], $data = []){

        $email = $data['email'];
        $redirect = $data['current_url'];

        $found = NewsletterUtente::findByEmail($email);


        if( !empty(NewsletterUtente::findByEmail($email)) ){
            Response::go($redirect."?errore-newsletter=1");
            exit;
        }


        $c = new NewsletterUtente($data);
        $c->save();

        Response::go($redirect."?iscritto-newsletter");
        exit;
    }


}