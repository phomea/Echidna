<?php
require dirname(__DIR__ ). '/vendor/autoload.php';
session_start();
session_unset();

use core\db\DbPdo;
use core\template\TwigLoader;
$root = dirname(__DIR__);

$twigloader = new TwigLoader();
$twigloader->addPath(__DIR__);
$twigloader->addPath(dirname(__DIR__)."/backend/template");


$twig = new \Twig_Environment($twigloader,[]);
$configdb = include $root."/config/db.php";
$configapplications = include $root."/config/_applications.php";


$template = "home";
if( isset($_GET['step'])){
    $template = $_GET['step'];
}



if($template == "savedb"){

    file_put_contents($root."/config/db.php",'<?php return '.var_export($_POST,true).";");
    $host   =   $_POST['host'];
    $db     =   $_POST['db'];
    $user   =   $_POST['user'];
    $password=  $_POST['password'];

    // stringa di connessione al DBMS
    $dbh = new DbPdo("mysql:host=$host", $user, $password);


    $dbh->exec("CREATE DATABASE `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;")
    or die(print_r($dbh->errorInfo(), true));
    header("Location: ?step=choseapplications");
    exit;
}


if($template == 'saveapplications'){

    /*"main"      =>  \applications\main\MainApplication::class,
    "login"     =>  \applications\login\LoginApplication::class,
    "users"     =>  \applications\users\UsersApplication::class,
    "assets"    => \applications\assets\AssetsApplication::class,*/

    $apps = [];
    $apps["main"]      = \applications\main\MainApplication::class;
    $apps["login"]      = \applications\login\LoginApplication::class;
    $apps["users"]      = \applications\users\UsersApplication::class;
    $apps["assets"]      = \applications\assets\AssetsApplication::class;

    $apps = array_merge($apps,$_POST);

    file_put_contents($root."/config/applications.php",'<?php return '.var_export($apps,true).";");

    \core\Bootstrap::init($root);

    foreach ($_POST as $key => $item) {
        $mock = \core\Environment::$ROOT."/applications/$key/mock/mockdata.sql";
        if( file_exists($mock) ){
            $m = file_get_contents($mock);
            \core\services\Db::$connection->exec( $m );
        }
    }

    header("Location: ?step=user");
    exit;
}


if($template == 'saveuser'){

    \core\Bootstrap::init($root);

    $role = new \applications\login\entities\UserRole(["name"=>"Admin"]);
    $role->save();

    $username = $_POST['user'];
    $password = $_POST['password'];

    $user = new \applications\login\entities\User([
        "username"=>$username,
        "password"  =>  \applications\login\LoginApplication::generateHash($password)
    ]);
    $user->type = $role->id;
    $user->save();

    header("Location: /backend/login");
    exit;
}

//-------render
echo $twig->render("$template.twig",[
    "configdb"  =>  $configdb,
    "configapplications" => $configapplications
]);