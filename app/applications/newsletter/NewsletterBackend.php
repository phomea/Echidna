<?php

namespace applications\newsletter;

use core\abstracts\BackendApplication;

class NewsletterBackend extends BackendApplication{
    static function getApplication()
    {
        return NewsletterApplication::class;
    }

}