<?php
namespace applications\reports;


use applications\reports\entities\Bolletta;

use applications\login\entities\User;
use applications\login\LoginApplication;
use core\Events;
use core\Injections;
use core\Query;

class FiltriQuery{

    static function init(){

        $userLogged = LoginApplication::getUserLogged();
        if(!$userLogged) return;

        $userType = $userLogged->getType();

        switch ($userType->slug){
            case "fornitore":
                self::initFornitore($userLogged);
                break;
            case "amministratore_condominio":
                self::initAmministratoreCondominio($userLogged);
                break;
        }
        //self::initSubFiltriAutomatici($userLogged);

    }


    /**
     * @param $userLogged User
     */
    static function initAmministratoreCondominio($userLogged){
        //Da rifare o ricontrollare

        /*
        $amministratore = AmministratoreCondominio::query()->where("user_id=".$userLogged->id)->getOne();
        $amministratore->expand();


        foreach (AnagraficaImmobiliApplication::install() as $entity){


            $schema = $entity::schema();

            if( isset($schema['idFornitore'])){
                $campo = $schema['idFornitore'];
                $campo->setTemplate("hidden");
                Injections::addToSchema($entity,"idFornitore",$campo);
            }

            if( isset($schema['idCondominio'])){
                $campo = $schema['idCondominio'];
                $campo->setTemplate("hidden");
                Injections::addToSchema($entity,"idCondominio",$campo);
            }

            if( isset($schema['idAmministratoreCondominio'])){
                $campo = $schema['idAmministratoreCondominio'];
                $campo->setTemplate("hidden");
                $campo->value = $amministratore->id;
                Injections::addToSchema($entity,"idAmministratoreCondominio",$campo);
            }

        }

        Events::add(Events::QUERY_GETALL,function ($query) use ($userLogged,$amministratore){


            // filtro su condominio
            if( $query->getEntity() == Condominio::class){
                $query->where("idAmministratoreCondominio=".$amministratore->id);
            }

            // filtro su edifici
            if( $query->getEntity() == Edificio::class){
                if( !empty($amministratore->condomini)){
                    $condomini = [];
                    foreach ($amministratore->condomini as $condominio){

                        $condomini[] = $condominio->id;
                    }


                    $query->where("idCondominio IN (".implode(",",$condomini).")");
                }

            }

        });
        */

    }

    /**
     * @param $userLogged User
     */
    static function initFornitore($userLogged){
        //Da rifare o ricontrollare

        /*
        $fornitore = Fornitore::query()->where("user_id=".$userLogged->id)->getOne();
        $fornitore->expand();


        //CONDOMINIO
        $campoCondominio_id_fornitore = Condominio::schema()["idFornitore"];
        $campoCondominio_id_fornitore->setTemplate("hidden");
        $campoCondominio_id_fornitore->value = $fornitore->id;
        Injections::addToSchema(Condominio::class,"idFornitore",$campoCondominio_id_fornitore);


        // EDIFICIO
        $campoEdificio_id_condominio = Edificio::schema()["idCondominio"];
        $campoEdificio_id_condominio->setTemplate("hidden");
        Injections::addToSchema(Edificio::class,"idCondominio",$campoEdificio_id_condominio);


        // AMMINISTRATORE DI CONDOMINIO
        $campoAmministratore_id_fornitore = AmministratoreCondominio::schema()["idFornitore"];
        $campoAmministratore_id_fornitore->setTemplate("hidden");
        $campoAmministratore_id_fornitore->value = $fornitore->id;
        Injections::addToSchema(AmministratoreCondominio::class,"idFornitore",$campoAmministratore_id_fornitore);


        // RESPONSABILI IMPIANTO
        $campoResponsabile_id_fornitore = ResponsabileImpianto::schema()["idFornitore"];
        $campoResponsabile_id_fornitore->setTemplate("hidden");
        $campoResponsabile_id_fornitore->value = $fornitore->id;
        Injections::addToSchema(ResponsabileImpianto::class,"idFornitore",$campoResponsabile_id_fornitore);



        Events::add(Events::QUERY_GETALL,function ($query) use ($userLogged,$fornitore){


            // filtro su condominio
            if( $query->getEntity() == Condominio::class){
                $query->where("idFornitore=".$fornitore->id);
            }

            // filtro su edifici
            if( $query->getEntity() == Edificio::class){
                if( !empty($fornitore->condomini)){
                    $condomini = [];
                    foreach ($fornitore->condomini as $condominio){

                        $condomini[] = $condominio->id;
                    }


                    $query->where("idCondominio IN (".implode(",",$condomini).")");
                }

            }

        });
        */

    }


    /*
    static function initSubFiltriAutomatici($userLogged){
        $fornitore = Fornitore::query()->where("user_id=".$userLogged->id)->getOne();
        $fornitore->expand();

        // AGGREGATORE
        $campoAggregatore_id_condominio = Aggregatore::schema()["idCondominio"];
        $campoAggregatore_id_condominio->setTemplate("hidden");
        Injections::addToSchema(Aggregatore::class,"idCondominio",$campoAggregatore_id_condominio);


        Events::add(Events::QUERY_GETALL,function ($query) use ($userLogged,$fornitore){

            // filtro su aggregatori
            if( $query->getEntity() == Aggregatore::class){
                if( !empty($fornitore->condomini)){
                    $condomini = [];
                    foreach ($fornitore->condomini as $condominio){
                        $condomini[] = $condominio->id;
                    }
                    $query->where("idCondominio IN (".implode(",",$condomini).")");
                }

            }

        });
    }
    */

}