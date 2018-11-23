<?php

return [
    "templateEngines"   =>  [
        "frontendTemplate"  =>  \frontend\standard\DefaultTemplate::class,
        "backendTemplate"   =>  \backend\BackendTemplate::class,
        "jsonTemaplate"     =>  \core\template\JsonTemplate::class
    ]
];