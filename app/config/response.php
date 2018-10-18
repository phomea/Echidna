<?php

return [
    "templateEngines"   =>  [
        "frontendTemplate"  =>  \frontend\spagnesi\SpagnesiTemplate::class,
        "backendTemplate"   =>  \backend\BackendTemplate::class,
        "jsonTemaplate"     =>  \core\template\JsonTemplate::class
    ]
];