<?php
namespace applications\anagraficaimmobili\applicazioni;

use applications\anagraficaimmobili\AnagraficaImmobiliApplication;
use applications\anagraficaimmobili\entities\Stanza;
use applications\login\LoginApplication;
use applications\main\entities\Notification;
use applications\meta\entities\Meta;
use Aura\Sql\Exception;
use core\Config;
use core\Email;
use core\Route;
use core\RouteFilter;
use core\services\Db;
use core\services\EmailService;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;
use function MongoDB\BSON\fromJSON;


class StanzeBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return AnagraficaImmobiliApplication::class;
    }

    static function getEntityClass()
    {
        return Stanza::class;
    }

    public static function actionAdd($params = [])
    {
        $m = parent::actionAdd($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Nuova Stanza";
        return $m;
    }

    public static function actionMod($params = [])
    {
        $m = parent::actionMod($params); // TODO: Change the autogenerated stub
        $m[1]["title"] = "Modifica Stanza: ".$m[1]["data"]->nomeStanza;
        return $m;
    }

    public static function actionList($params = [])
    {
        $m = parent::actionList($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Elenco delle Stanze";
        return $m;
    }

}

