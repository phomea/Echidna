<?php

/**
 * If not present declare the getallheaders function
 */
if (!function_exists('getallheaders')) {
    function getallheaders() {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

// Check composer
    if(!file_exists(__DIR__."/vendor/autoload.php")){
        echo "Go in app directory and run 'php composer.phar install'";


        exit;
    }
    // load composer
    $autoloader = require __DIR__ . '/vendor/autoload.php';

    \core\Bootstrap::init(__DIR__, $autoloader);


try {
    \core\services\RouterService::dispatch();
}catch (\core\exceptions\NotFoundException $e){
    $template = \core\services\Response::getTemplateToUse();
    $template->template="notfound";
    header("HTTP/1.0 404 Not Found");
    echo $template->render();
    exit;
}
$template = \core\services\Response::getTemplateToUse();
echo $template->render();