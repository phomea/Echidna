<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Ordine;
use applications\ecommerce\entities\Prodotto;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Route;
use core\Environment;
use core\services\RouterService;

class Prodotti extends BackendApplication {

    static function getApplication()
    {
        return EcommerceApplication::class;
    }


    static function getEntityClass()
    {
        return Prodotto::class;
    }

    static function importCSV($dataGET)
    {
        $cssfile = Environment::$ROOT . "/applications/ecommerce/assets/css/importa.css";
        $cssrules = file_get_contents($cssfile);
        $dataGET["additional_css"] = $cssrules;
        return array("ecommerce/templates/importa",$dataGET);
    }
    static function macinaCSV($getVars, $postVars=NULL)
    {
        //Elaborazione file

        $csv = array();
        $messaggio = "";
        $stato = 0;
        $solo_inseriti = (int)isset($postVars["solo_inseriti"]);
        $solo_prezzi = (int)isset($postVars["solo_prezzi"]);

        // check there are no errors
        if($_FILES['csv']['error'] == 0){
            $stato = 1;
            $name = $_FILES['csv']['name'];
            $ext = explode('.', $_FILES['csv']['name']);
            $ext = strtolower(end($ext));
            $type = $_FILES['csv']['type'];
            $tmpName = $_FILES['csv']['tmp_name'];

            // check the file is a csv
            if($ext === 'csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    // necessary if a large csv file
                    set_time_limit(0);

                    $row = 0;

                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        // number of fields in the csv
                        $col_count = count($data);

                        // get the values from the csv
                        $csv[$row]['listino'] = $data[0];
                        $csv[$row]['desc_listino'] = $data[1];
                        $csv[$row]['modello'] = $data[2];
                        $csv[$row]['desc_modello'] = $data[3];
                        $csv[$row]['versione'] = $data[4];
                        $csv[$row]['desc_versione'] = $data[5];
                        $csv[$row]['rivestimento'] = $data[6];
                        $csv[$row]['desc_rivestimento'] = $data[7];
                        $csv[$row]['prezzo_scontato'] = (float)str_replace(",", ".", $data[8]);
                        $csv[$row]['prezzo_pieno'] = (float)str_replace(",", ".", $data[9]);
                        $csv[$row]['altezza'] = (float)str_replace(",", ".", $data[10]);
                        $csv[$row]['larghezza'] = (float)str_replace(",", ".", $data[11]);
                        $csv[$row]['profondita'] = (float)str_replace(",", ".", $data[12]);
                        $csv[$row]['altezza_seduta'] = (float)str_replace(",", ".", $data[13]);
                        $csv[$row]['metri_cubi'] = (float)str_replace(",", ".", $data[14]);
                        $csv[$row]['sedute'] = (float)str_replace(",", ".", $data[15]);
                        $csv[$row]['quantita'] = (int)str_replace(",", ".", $data[16]);
                        // inc the row
                        $row++;
                    }
                    fclose($handle);

                    if($row>0){
                        $stato = 1;
                        $messaggio = serialize($csv);
                    }else{
                        $stato = 2;
                        $messaggio = "Impossibile aprire il file";                        
                    }

                }else{
                    $stato = 2;
                    $messaggio = "Impossibile aprire il file";
                }
            }else{
                $stato = 2;
                $messaggio = "Il file non è un CSV";
            }
        }else{
            $stato = 2;
            $messaggio = "Errori caricamento file";
        }

        //Qui devo parsare i dati e creare il che mi serve
        //$messaggio = $solo_inseriti;

        //redirect
        RouterService::getRoute("backend.prodotti.importa")->go([ "stato"=>$stato, "messaggio"=>$messaggio] );
        //return array("ecommerce/templates/importa",array());
    }

    static function declareRoutes(){
        $rotte = array();
        //$rotte = parent::declareRoutes();
        $rotte["backend.prodotti.importa"] = new Route("importa","importa",[static::class,"importCSV"]);
        $rotte["backend.prodotti.importa.macina"] = (new Route("importa","importa",[static::class,"macinaCSV"]))->method(Route::METHOD_POST);

        return $rotte;
    }

}