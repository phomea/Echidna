#!/usr/bin/env php
<?php
use console\ConsoleApplication;

require __DIR__ . '/vendor/autoload.php';

\core\Environment::init(__DIR__);


$arguments = $argv;

$app = new ConsoleApplication($arguments);

exit;