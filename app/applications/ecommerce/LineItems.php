<?php
namespace applications\ecommerce;

use applications\ecommerce\entities\LineItem;
use core\abstracts\BackendApplication;

class LineItems extends BackendApplication{
    static function getEntityClass()
    {
        return LineItem::class;
    }
}