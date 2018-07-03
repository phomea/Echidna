<?php
namespace core;

class Songkick extends Api{
    private $key = "91pd72IXB7iDlCB2";
    private $artist = "9381919";
    private $baseurl = "http://api.songkick.com/api/3.0/artists/";

    public function __construct()
    {
        parent::__construct($this->baseurl);
        $this->addGetParam("apikey",$this->key);
    }

    function calendar(){
        return $this->get($this->artist."/calendar.json")['resultsPage']["results"]['event'];
    }

}