<?php




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