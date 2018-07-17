<?php
namespace core;

class Api{

    const RETURN_JSON = "JSON";
    const RETURN_ARRAY = "ARRAY";

    protected $base = "";

    protected $getParams = [];

    protected $returnType = Api::RETURN_ARRAY;

    /**
     * Api constructor.
     * @param string $base
     */
    public function __construct($base)
    {
        $this->base = $base;
    }

    public function addGetParam( $name, $value){
        $this->getParams[] = [$name,$value];
    }

    public function get($url){



        if( count($this->getParams) > 0) {
            $p = [];
            foreach ($this->getParams as $getParam) {
                $p[] = implode("=",$getParam);
            }
            $url .= "?" . implode("&", $p);
        }

        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $this->base.$url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $this->returnData($output);
    }

    function returnData( $data ){


        if( $this->returnType == Api::RETURN_ARRAY ){
            return json_decode($data,true);
        }else if($this->returnType == Api::RETURN_JSON){
            return $data;
        }else{
            return $data;
        }
    }
}