<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Coupon;
use applications\ecommerce\entities\Ordine;
use core\abstracts\Application;
use core\abstracts\BackendApplication;


class CouponApplication extends BackendApplication {
    static function getApplication()
    {
        return EcommerceApplication::class;
    }



    static function getEntityClass()
    {
        return Coupon::class;
    }

    static function declareRoutes()
    {
        $r = parent::declareRoutes();

        return $r;
    }

}