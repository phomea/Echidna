<?php
namespace applications\reports;

use applications\reports\entities\Bolletta;

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


class ReportsBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return ReportsApplication::class;
    }

    static function getEntityClass()
    {
        return Bolletta::class;
    }

}

