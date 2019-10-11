<?php

namespace applications\reports;

class Costanti{

    const SERVIZI = [0=>"cli",1=>"cle",2=>"acs"];

    static function getServizi(){
        return self::SERVIZI;
    }

}


