<?php


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

    if(!file_exists(__DIR__."/vendor/autoload.php")){
        echo "Run composer install";
        exit;
    }
    require __DIR__ . '/vendor/autoload.php';

    \core\Bootstrap::init(__DIR__);


try {
    \core\services\RouterService::dispatch();
}catch (\core\exceptions\NotFoundException $e){
    $template = \core\services\Response::getTemplateToUse();
    $template->template="notfound";
    echo $template->render();
    exit;
}
$template = \core\services\Response::getTemplateToUse();
echo $template->render();