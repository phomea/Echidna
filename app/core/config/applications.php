<?php 
/**
 * Core applications
 */

use applications\assets\AssetsApplication;
use applications\login\LoginApplication;
use applications\main\MainApplication;
use applications\media\MediaApplication;
use applications\meta\MetaApplication;
use applications\pages\PagesApplication;
use applications\settings\SettingsApplication;
use applications\users\UsersApplication;

return [
    "main"  =>  MainApplication::class,
    "login" =>  LoginApplication::class,
    "users" =>  UsersApplication::class,
    "assets"    =>  AssetsApplication::class,
    "settings"  =>  SettingsApplication::class,
    "media" =>  MediaApplication::class,
    "meta"  =>  MetaApplication::class,
    "pages" =>  PagesApplication::class
];