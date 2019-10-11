<?php

namespace applications\reports\entities;


use applications\anagraficaimmobili\entities\LayoutProspettoMillesimale;
use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\TipoAggregatore;


class Bolletta extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),

            "idCondominio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Condominio::getForSelect("denominazione","id"))->setLabel("Condominio"),
            "progressivo"   =>  Field::varchar(100)->editable()->setFieldsize("medium")->setPlaceholder("Inserire un progressivo o codice bolletta")->setLabel("Progressivo Bolletta")->setMaxlength(100)->required(),


            "data_periodo_inizio"=> Field::date()->editable()->setTemplate("data")->setLabel("Data INIZIO Periodo di fatturazione")->setFieldsize("medium"),
            "data_periodo_fine"=> Field::date()->editable()->setTemplate("data")->setLabel("Data FINE Periodo di fatturazione")->setFieldsize("medium"),

            "data_emissione"  =>  Field::date()->editable()->inlist(false)->setTemplate("data")->setLabel("Data emissione delle Bollette")->setHint("Inserisci la data di emissione del documento.")->setPlaceholder("Clicca e seleziona una data")->setMaxlength(10)->setFieldsize("medium"),
            //"data_scadenza"=> Field::date()->editable()->inlist(false)->setTemplate("data")->setLabel("Data di scadenza delle Bollette"),

            "attivo"  =>  Field::int()->inlist(false),
            "normativa" =>  Field::int()->editable()->setTemplate("select")->setLabel("Normativa Applicata")->setTemplateVar([
                ["label"=>"10200:2015","value"=>0],
                ["label"=>"DLGS141/2016","value"=>1],
                ["label"=>"10200:2018","value"=>2],
            ])->setFieldsize("medium"), /*
                10200:2015
                DLGS141/2016   ->far scegliere millesimi altrimenti i millesimi sono termici nuovi
                10200:2018
 */
            "millesimi_utilizzati"  =>  Field::int()->editable()->inlist(false)->setLabel("Millesimi da Utilizzare per il calcolo")->setTemplate("select")->setTemplateVar([
                ["label"=>"Termici nuovi","value"=>0],
                ["label"=>"Termici vecchi","value"=>1],
                ["label"=>"Altri millesimi","value"=>2],
                ["label"=>"Millesimi di proprietà","value"=>3],
                ["label"=>"Equiripartizione","value"=>4],
            ])->hideIf("normativa",[0,2])->setFieldsize("medium"),
            "label_millesimi"   =>  Field::varchar(50)->editable()->setFieldsize("medium")->setPlaceholder("Altri Millesimi")->setLabel("Etichetta Millesimi")->setMaxlength(50)->setHint("Label da usare in bolletta")
                ->hideIf("normativa",[0,2]),


            "coeff"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setLabel("Frazione Consumo involontario (f*x_inv)")->setFieldsize("medium")
                ->hideIf("normativa",[0]),

            "spese_di_manutenzione"    =>  Field::float()->inlist(false)->editable()->setLabel("Spese di Manutenzione Impianto")->setFieldsize("medium"), //
            "tipo_gestione"   =>  Field::int()->editable()->inlist(false)->setTemplate("select")->setLabel("Metodo costo gestione ripartitori")->setTemplateVar([
                ["label"=>  "Importo Totale","value"=>0],
                ["label" =>  "Costo per contatore","value"=>1]
            ])->setFieldsize("medium"),
            "costo_gestione_contatori"    =>  Field::float()->inlist(false)->editable()->setLabel("Costo di gestione dei Ripartitori")->setFieldsize("medium"), //

            // "costo_invio_bolletta"    =>  Field::float()->inlist(false)->editable()->setLabel("Costo extra per ogni singolo appartamento"), //

            "data_generazione"  =>  Field::date()->setLabel("Data di generazione della Bolletta")->inlist(false),

            "idLayoutProspettoMillesimale"  =>  Field::int()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("select")->setTemplateVar(LayoutProspettoMillesimale::getForSelect("descrizione","id"))->setLabel("Layout Prospetto Millesimale"),

        ];
    }


    function displayValue($key)
    {
        switch ($key){

            case "idCondominio":
                if( $this->idCondominio ) {
                    $f = Condominio::findById($this->idCondominio);
                    if ($f) {
                        return $f->denominazione;
                    }
                }
                break;
            case "normativa":
                if($this->normativa!="") {
                    switch((int)$this->normativa){
                        case 0: return "10200:2015";
                        case 1: return "DLGS141/2016";
                        case 2: return "10200:2018";
                        default: return "boh";
                    }
                    $f = Condominio::findById($this->idCondominio);
                    if ($f) {
                        return $f->denominazione;
                    }
                }
                break;

        }
        return parent::displayValue($key);
    }


}


