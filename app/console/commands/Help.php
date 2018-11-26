<?php
namespace console\commands;

class Help extends BaseCommand {
    public function process(){
        $this->title("Echidna console help");

        $this->line("Commands you can use: ");
        $this->step("application:create [name] -> interactively create a new application");
    }
}