<?php
use applications\ecommerce\EcommerceFrontend;

return [
    "urls"  =>  [
        EcommerceFrontend::ROUTE_CARRELLO =>    "carrello"
    ],
    "applications"  =>  [
        "frontend"  =>  \frontend\spagnesi\applications\ecommerce\EcommerceSpagnesiFrontend::class
    ]
];