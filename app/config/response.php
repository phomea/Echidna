<?php

use frontend\standard\StandardTemplate;

return [
    "templateEngines"   =>  [
        "frontendTemplate"  =>  StandardTemplate::class,
        "backendTemplate"   =>  \backend\BackendTemplate::class,
        "jsonTemplate"     =>  \core\template\JsonTemplate::class
    ]
];