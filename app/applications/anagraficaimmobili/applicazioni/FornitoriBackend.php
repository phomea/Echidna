<?php
namespace applications\anagraficaimmobili\applicazioni;

use applications\anagraficaimmobili\AnagraficaImmobiliApplication;
use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\Edificio;
use applications\anagraficaimmobili\entities\Fornitore;
use applications\anagraficaimmobili\entities\UnitaAbitativa;
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


class FornitoriBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return AnagraficaImmobiliApplication::class;
    }

    static function getEntityClass()
    {
        return Fornitore::class;
    }

    public static function actionList($params = [])
    {
        $m = parent::actionList($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Elenco dei Fornitori";
        return $m;


    }

    public static function actionMod($params = [])
    {
        $m = parent::actionMod($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Modifica anagrafica Fornitore";
        return $m;
    }

    public static function actionAdd($params = [])
    {
        $m = parent::actionAdd($params); // TODO: Change the autogenerated stub
        $m[1]['title'] = "Aggiungi nuovo Fornitore";
        return $m;
    }

}

