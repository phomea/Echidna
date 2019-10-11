<?php

namespace applications\pages;

use applications\main\widgets\WidgetCard;
use applications\meta\entities\Meta;
use applications\meta\MetaBackend;
use applications\pages\entities\Contenuto;
use applications\pages\entities\Pagina;
use applications\pages\entities\TipoContenuto;
use applications\pages\widgets\WidgetAggiungiNuovaPagina;
use applications\pages\widgets\WidgetPageNumber;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Cache;
use core\Config;
use core\Environment;
use core\Route;
use core\services\Db;
use core\services\Response;

class TipiContenutoBackend extends BackendApplication{


   


    static function getEntityClass()
     {
         return TipoContenuto::class;
     }

    static function getApplication()
    {
        return PagesApplication::class;
    }

  


}