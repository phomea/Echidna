<?php
namespace console;

use console\commands\Application_Create;

class ConsoleApplication{
    public $args = [];
    public $command = "help";

    public $commands = [
        "application:create"    =>  Application_Create::class
    ];

    /**
     * ConsoleApplication constructor.
     */
    public function __construct($args = [])
    {
        $this->args = $args;
        array_shift($this->args);

        if(isset($this->commands[$this->args[0]])){
            $this->command = $this->args[0];
        }
        array_shift($this->args);
        $this->response();
    }

    public function createCommandClass(){
        $ex = explode(":",$this->command);
        foreach ($ex as $key=>$value){
            $ex[$key] = ucfirst($value);
        }
        return "console\\commands\\".implode("_",$ex);
    }
    public function response(){

        $commandClass = $this->createCommandClass();
        $c = new $commandClass($this->args);
        $c->process();
    }
}