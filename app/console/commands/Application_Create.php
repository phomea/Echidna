<?php

namespace console\commands;

use core\db\Field;
use core\Environment;

class Application_Create extends BaseCommand {
    public $args=[];

    public $entities = [];
    public $appname = "";
    public $apppath = "";

    /**
     * Application_Create constructor.
     */
    public function __construct($args)
    {
        $this->args = $args;
    }

    public function process(){

        $appplicationsroot = Environment::$APPLICATION_ROOT;

        $appname = $this->args[0];
        $apppath = $appplicationsroot."/".$appname;

        $this->apppath = $apppath;
        $this->appname = $appname;

        if( is_dir($apppath)){
            if( strtolower(readline("L'applicazione esiste già, vuoi creare un nuovo modello?[Y,n]")) !== "n" ){
                $this->askForEntity();
            }
            exit;
        }

        $this->title("Creo le cartelle necessarie");

        // crea cartella applicazione
        $this->step("Cartella applicazione");
        mkdir($apppath) or $this->error("Controlla di avere i permessi per create la directory\n",true);
        $this->success("Cartella creata");

        mkdir($apppath."/entities");
        mkdir($apppath."/template");

        $namespace = "applications\\$appname";
        $entitiNamespace = $namespace."\\entities";

        $this->askForEntity();



    }

    public function askForEntity(){
        $r = readline("Vuoi creare un modello dati? [Y,n]");

        if( strtolower($r) != "n" ){
            $nome = readline("Inserisci il nome del modello dati :  ");
            $this->entities[$nome] = [
                "schema" => []
            ];

            $this->createEntity($nome);
            $b = $this->getEntityBoilerplate($nome);

            file_put_contents($this->apppath."/entities/".ucfirst($nome).".php",$b);
        }

    }
    public function createEntity( $nomeentita ){

            while ( strtolower($r = readline("Vuoi aggiungere un campo al modello?[Y,n]") ) != "n" ){
                $this->createField($nomeentita);
            }
    }

    public function createField( $nomeentita){
        $nomecampo = "";

        $nomecampo = readline("Scegli il nome del campo : ");


        $s = readline("Scegli il tipo di campo : 
        1 - int
        2 - text
        3 - varchar
        4 - Annulla\n :::");

        switch ($s){
            case 1:
                $this->entities[$nomeentita]['schema'][$nomecampo] = Field::int();
                break;
            case 2:
                $this->entities[$nomeentita]['schema'][$nomecampo] = Field::text();
                break;
            case 3:
                $lunghezza = "";
                $lunghezza = readline("Inserisci la lunghezza del campo[ default : 512] ");
                if( $lunghezza == "") $lunghezza = 512;

                $this->entities[$nomeentita]['schema'][$nomecampo] = Field::varchar($lunghezza);
                break;
            case 4:
                break;

        }
    }

    public function getEntityBoilerplate( $name ){
        $entityClass = ucfirst($name);

        $schema = "";
        foreach ($this->entities[$name]['schema'] as $key => $value ){
            $schema.= "\"$key\" => Field::";
            switch ($value->getData()['Type']){
                case Field::TYPE_INT:
                    $schema.="int()";
                    break;
                case Field::TYPE_STRING:
                    $schema.="varchar(".$value->getData()['length'].")";
                    break;
                case Field::TYPE_TEXT:
                    $schema.="text()";
                    break;
            }

            $schema .=",\n";
        }



        $entity = <<<ENTTY
<?php
namespace  applications\\$this->appname\\entities;
 
use core\Model;
use core\db\Field;

class $entityClass extends Model{
    static function schema()
    {
        return[
            $schema
        ];
    }

}
ENTTY;
        return $entity;
    }
}