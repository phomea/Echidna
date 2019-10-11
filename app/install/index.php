<?php
$autoloader = require dirname(__DIR__ ). '/vendor/autoload.php';
session_start();
session_unset();

use core\Config;
use core\db\DbPdo;
use core\template\TwigLoader;
$root = dirname(__DIR__);

$twigloader = new TwigLoader();
$twigloader->addPath(__DIR__);
$twigloader->addPath(dirname(__DIR__)."/backend/template");


$twig = new \Twig_Environment($twigloader,[]);
$configdb = include $root."/config/db.php";
$configapplications = include $root."/config/applications.php";


$template = "home";
if( isset($_GET['step'])){
    $template = $_GET['step'];
}

if($template == "db" && isset($_ENV["MYSQL_HOST"])){
    $_POST["host"] = $_ENV["MYSQL_HOST"];
    $_POST["db"] = $_ENV["MYSQL_DATABASE"];
    $_POST["user"] = $_ENV["MYSQL_USER"];
    $_POST["password"] = $_ENV["MYSQL_PASSWORD"];
    $template ="savedb";
}


if($template == "savedb"){

    file_put_contents($root."/config/db.php",'<?php return '.var_export($_POST,true).";");
    $host   =   $_POST['host'];
    $db     =   $_POST['db'];
    $user   =   $_POST['user'];
    $password=  $_POST['password'];

    // stringa di connessione al DBMS
    $dbh = new DbPdo("mysql:host=$host", $user, $password);


    $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;")
    or die(print_r($dbh->errorInfo(), true));

    $dbh->exec("USE $db");
    $dbh->exec('CREATE TABLE if not EXISTS settings (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(30),
    setting_value VARCHAR(30),
    active INT(1)
    )');


    $dbh->exec('insert into settings (setting_key,setting_value) values("echidna.version","1")');




    header("Location: ?step=choseapplications");
    exit;
}


if($template == 'saveapplications'){

    /*"main"      =>  \applications\main\MainApplication::class,
    "login"     =>  \applications\login\LoginApplication::class,
    "users"     =>  \applications\users\UsersApplication::class,
    "assets"    => \applications\assets\AssetsApplication::class,*/


    $apps = include $root."/core/config/applications.php";
    

    $apps = array_merge($apps,$_POST);

 
    file_put_contents($root."/config/applications.php",'<?php return '.var_export($apps,true).";");

    \core\Bootstrap::init($root,$autoloader);

    if( \core\services\Db::getVersion() === false ){
        \core\services\Db::$connection->query('INSERT into settings ("key","value") values("echidna.version","1")');
    }
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

    \core\Bootstrap::init($root,$autoloader);

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

if( $template == "home"){

 
    if(!file_exists($root."/backend/theme")) {
         
        $backendTheme = new ZipArchive();
        $backendTheme->open($root . "/backend/theme.zip");
        $backendTheme->extractTo($root . "/backend");
        $backendTheme->close();
    }
}
//-------render
echo $twig->render("$template.twig",[
    "configdb"  =>  $configdb,
    "configapplications" => $configapplications
]);