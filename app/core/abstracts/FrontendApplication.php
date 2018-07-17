<?php

namespace core\abstracts;


use core\services\Response;

abstract class FrontendApplication{

    static $application;

    static function declareRoutes(){ return [];}

    static function init(){
        Response::setTemplateToUse("frontendTemplate");
    }

}