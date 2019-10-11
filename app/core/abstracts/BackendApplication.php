<?php

namespace core\abstracts;


use applications\anagraficaimmobili\entities\ResponsabileImpianto;
use backend\BackendTemplate;
use core\db\Field;
use core\db\Pagination;
use core\Events;
use core\Model;
use core\Route;
use core\services\Db;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\template\CSVTemplate;

abstract class BackendApplication
{

    /**
     * @return Application
     */
    static function getApplication()
    {
        return static::class;
    }

    static function declareWidgets()
    {
        return [];
    }


    static function getEntityClass()
    {
        $appllication = static::getApplication();
        return $appllication::getEntityClass();
    }

    static function declareRoutes()
    {

        $entity = static::getEntityClass();
        if ($entity == null) {
            return [];
        }
        return [
            $entity::getEntity().".list"       =>  new Route("list",$entity::getListLink(),[static::class,"actionList"]),
            $entity::getEntity().".preview"        =>  new Route("mod","preview/".$entity::getModLink(),[static::class,"actionPreview"]),
            $entity::getEntity().".mod"        =>  new Route("mod",$entity::getModLink(),[static::class,"actionMod"]),
            $entity::getEntity().".add"        =>  new Route("add",$entity::getAddLink(),[static::class,"actionAdd"]),


            $entity::getEntity().".update"     =>  (new Route("update",$entity::getUpdateLink(),[static::class,'actionUpdate']))->method(Route::METHOD_PUT),
            $entity::getEntity().".insert"     =>  (new Route("insert",$entity::getAddLink(),[static::class,'actionInsert']))->method(Route::METHOD_POST),
            $entity::getEntity().".delete"     =>  (new Route("insert",$entity::getModLink()."/delete",[static::class,'actionDelete'])),
            $entity::getEntity().".deactivate"     =>  (new Route("deactivate",$entity::getModLink()."/deactivate",[static::class,'actionDeactivate'])),
            $entity::getEntity().".activate"     =>  (new Route("activate",$entity::getModLink()."/activate",[static::class,'actionActivate'])),
            $entity::getEntity().".export"     =>  (new Route("export",$entity::getListLink()."/export",[static::class , 'actionExport'])),
            $entity::getEntity().".import"     =>  (new Route("import",$entity::getListLink()."/import",[static::class , 'actionImport'])),
            $entity::getEntity().".import.save"     =>  (new Route("import",$entity::getListLink()."/import/save",[static::class , 'actionImportSave']))->method(Route::METHOD_POST),
            $entity::getEntity().".displayvalue"     =>  (new Route("import",$entity::getModLink()."/displayvalue/{value:(.*)}",[static::class , 'actionDisplayValue'])),
            $entity::getEntity().".complessList"       =>  new Route("complessList",$entity::getListLink()."/{params:(.*)}",[static::class,"actionComplessList"]),
            $entity::getEntity().".changeOrder"       =>  (new Route("changeOrder","change-order",[static::class,"actionChangeOrder"]))->method(Route::METHOD_POST),

        ];
    }


    static function actionChangeOrder($params = [], $post = []){




        foreach ($post['orders'] as $key=>$value ){
            $id = str_replace("id","",$key);
            if( $e = static::getEntityClass()::findById($id) ){
                $e->_order = $value;
                $e->save();
            }
        }
        exit;
    }

    static function actionPreview($params){
        $m = self::actionMod($params);



        $m[0] ="preview";

        return $m;
    }

    static function actionDisplayValue( $params = []){

        $entity = static::getEntityClass();

        $data = $entity::findById($params['id']);

        echo $data->displayValue($params['value']);

        exit;
    }

    static function init(){
        Response::setTemplateToUse("backendTemplate");

        if( Request::getParams("template_extend")){
            Response::addVariable([
                "template_extend"   =>  Request::getParams("template_extend")
            ]);
        }else{
            Response::addVariable([
                "template_extend"   =>  "base.twig"
            ]);
        }

    }

    static function generateFields( $entity, $data , $schema = null, $gerarchy = null ){

        $fields = [];
        if( $schema == null ){
            $schema = $entity::schema();
        }


        foreach ($schema as $key => $item) {
            if( $item->isEditable()){
                if( $item->isExternal() ){
                    /**
                     * @var $item Field
                     */
                    // external

                    $fieldsExternal = [];
                    $externalEntity = null;
                    if( $data && property_exists( $data, $key) ) {
                        $item->value = $data->$key;

                        $externalEntity = $item->findExternalEntity();


                    }

                    $entitySchema =$item->getExternalEntity()::schema();

                    $schemaFull = [];
                    foreach ( $item->getExternalSchema() as $ks => $vs){
                        if( isset($entitySchema[$vs]) ){
                            $schemaFull[ $vs ] = $entitySchema[$vs];
                        }
                    }



                    $schemaFull[$item->getExternalField()] = $entitySchema[$item->getExternalField()]->setTemplate("default");


                    $fieldsExternal = self::generateFields($item->getExternalEntity(),$externalEntity,$schemaFull,"externals[".$key."][%s]");



                    $fields[$key] = Response::getTemplateToUse("fields/default",
                        [
                            "data"  =>  $data,
                            "property"  =>  $key,
                            "field" =>  $item
                        ])->render();

                    $fields = array_merge($fields,$fieldsExternal);

                }else{
                    /**
                     * @var $item Field
                     */

                    if( $data && property_exists( $data, $key) ) {
                        $item->value = $data->$key;
                    }


                    $fieldKey = $key;

                    if($gerarchy != null ){
                        $fieldKey = sprintf($gerarchy,$key);
                        if( $item->label == "" ){
                            $item->label = $key;
                        }

                    }
                    $item->expandTemplateVar($data);
                    
                    $template = BackendTemplate::getFieldTemplate($item->template);
                    $fields[$fieldKey] = Response::getTemplateToUse($template,
                        [
                            "data"  =>  $data,
                            "property"  =>  $fieldKey,
                            "field" =>  $item
                        ])->render();

                }

            }
        }
        return $fields;
    }

    /*
     static function generateFields($entity, $data, $parent = "")
    {

        $fields = [];
        foreach ($entity::schema() as $key => $item) {
            if ($item->isEditable()) {
                if( !empty($item->customRenderer )){

                    $fields[$key]  = call_user_func_array($item->customRenderer,[
                        "field" =>  $item,
                        "entity"    =>  $entity,
                        "data"  =>  $data,
                        "property"  =>   $parent != "" ? $parent . "[" . $key . "]" : $key
                    ]);
                }else{


                    if ($data && property_exists($data, $key)) {
                        $item->value = $data->$key;
                    }

                    $item->expandTemplateVar();
                    $fields[$key] = Response::getTemplateToUse("fields/" . $item->template,
                        [
                            "data" => $data,
                            "property" => $parent != "" ? $parent . "[" . $key . "]" : $key,
                            "field" => $item
                        ])->render();
                }
            }
        }
        return $fields;
    }

     */
    static function actionAdd( $params =[] ){

        return static::actionMod($params);

        $entity = static::getEntityClass();
        $e = new $entity($params);
        $fields = static::generateFields($entity, $e );

        Response::addVariable(
            [
                "title"         =>  "Aggiungi ".$entity::getEntityName(),

            ],true
        );

        return [
            "mod",[

                "data"  =>  $e ,
                "fields"    =>  $fields

            ]
        ];

    }

    static function actionMod( $params =[] ){
        $entity = static::getEntityClass();
        if( isset($params['id']) ) {
            $data = $entity::findById($params['id']);
        }else{
            $data = new $entity($params);
        }

        $fields = static::generateFields($entity,$data);



        $return = [
            "mod",[
                "title"         =>  "Modifica ".$entity::getEntityName(),
                "data"  =>  $data,
                "fields"    =>  $fields,
                "entity"    =>  $entity,
                "breadcrumbs"   =>  [
                    ["link"=>RouterService::getRoute($entity.".list")->build(),"label"=>"Lista ".$entity::getEntityName()]
                ]

            ]
        ];
        $return = Events::dispatch(Events::BACKEND_ACTION_MOD_RETURN,$return);



        return $return[0];

    }

    static function actionInsert( $params = [] , $data = null){
        $entity = static::getEntityClass();


        if( isset($data['externals'])){


            $externals = $data['externals'];
            unset($data['externals']);





            foreach ($externals as $key=>$value){
                $externalField = $entity::schema()[$key];

                $fieldname = $externalField->getExternalField();

                $externalFieldValue = $data[$key];


                $findby = "findBy".ucfirst($fieldname);



                $externalEntityObj = null;

                if($externalFieldValue)
                $externalEntityObj = $externalField->getExternalEntity()::$findby($externalFieldValue);



                if( $externalEntityObj ){


                    $externalEntityObj->buildProperties($value);
                    $externalEntityObj->save();
                }else{
                    $e = $externalField->getExternalEntity();

                    $externalEntityObj = new $e($value);

                    $externalEntityObj->save();

                    $data[$key] = $externalEntityObj->$fieldname;

                }



            }


        }


        /**
         * @var $e Model
         */
        $e = new $entity($data);
        $e->save();

        return Response::redirect(
            [
                [
                    "label"=>"Vai alla lista"  , "url" => RouterService::$routes[$e::getEntity().".list"]->build()
                ],
                [
                    "label"=>"Continua"  , "url" =>   RouterService::$routes[$e::getEntity().".mod"]->build(['id'=>$e->id])
                ]
            ]

            ,$e);
    }

    static function actionUpdate( $params = [] , $data = null){
        /**
         * @var $entity Model
         * @var $e Model
         */
        $entity = $data['form_entity'];

        if( isset($data['externals'])){


            $externals = $data['externals'];
            unset($data['externals']);



            foreach ($externals as $key=>$value){
                $externalField = $entity::schema()[$key];

                $fieldname = $externalField->getExternalField();

                $externalFieldValue = $data[$key];


                $findby = "findBy".ucfirst($fieldname);


                $externalEntityObj = $externalField->getExternalEntity()::$findby($externalFieldValue);

                if( $externalEntityObj ){


                    $externalEntityObj->buildProperties($value);
                    $externalEntityObj->save();
                }

            }


        }

        $e = new $entity($data);
        $e->save();
        return [
            "mod",
            [
                "data"  =>  $e
            ]
        ];
    }


    static function actionComplessList( $params = []){

        $advParams = explode("/",$params['params']);
        $where = [];
        $joins = [];

        $currentMode = "";

        $entity = static::getEntityClass();
        $query = $entity::query(true);


        foreach ($advParams as $value){
            if ($value == "where"){
                $currentMode = "where";
                continue;
            }
            if ($value == "join"){
                $currentMode = "join";
                continue;
            }

            if($currentMode == "where"){
                $query->where($value);
                $where[] = $value;
            }

            if($currentMode == "join"){
                $query->rawJoins[]=$value;
            }
        }


        $pp = $params['params'];





        $ppp = explode("/",$pp);
        $pp= implode("/",array_map(function($val){
            return rawurlencode(str_replace('+','%2B',$val));


        },$ppp));



        $c = RouterService::getRoute($entity.".complessList")->build(
            array_merge(
            [
                "params"=>$pp,
            ], isset($params['routeParams']) ? $params['routeParams'] : []
            )
        );



           /* $cc = explode("/",$c);
            $c = implode("/",array_map(function($val){
                return rawurlencode(str_replace('+','%2B',$val));


            },$cc));*/



       return self::actionFilteredList(array_merge($params,[
           "custom_query"=>$query,
           "current_url"    => $c
       ]));
    }

    static function actionList( $params = [] ){



        $entity = static::getEntityClass();

        $query = $entity::query(true);

        $currentPage = $params['page'] ?? 1;
        $number_per_page = $params['number_per_page'] ?? Pagination::DEFAULT_NUMBER_PER_PAGE;

        $query->setNumberPerPage( $number_per_page )->setPage($currentPage);


        if(isset($params['orderby'])){
            $query->setOrderBy($params['orderby']);
        }

        if(isset($params['order'])){
            $query->setOrder($params['order']);
        }

        if( isset($params['where']) ){

            $query->setWhere($params['where']);
        }



        $data =  $query->getAll();





        $pagination = $query->getPagination();


       /* Response::addVariable(
            [ "title"         =>  "Lista ".$entity::getEntityName(),

                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ],
                "application_info"  =>  [
                    "icon"   =>  static::getIcon("actionMod"),
                    "title"   =>  static::getTitle("actionList"),
                    "description"   =>  static::getDescription("actionList")
                ]
            ]
        );
*/





        return [
            "list",[
                "title"         =>  "Lista ".$entity::getEntityName(),
                "data"      => $data,
                "entity"    =>  $entity,
                "fields"    =>  $entity::schema(),
                "pagination"    =>  $pagination,
                "query" =>  $query,
                "url"=> $params['current_url'],
                "routeParams"   =>  $params['routeParams'] ?? []
            ]
        ];
    }

    static function actionFilteredList( $params = [] ){


        $entity = static::getEntityClass();
        $query = $entity::query();
        if(isset($params["custom_query"])){
            $query = $params['custom_query'];
            $query->entity = $entity;
            $query->table = $entity::getTable();
        }

        $currentPage = $params['page'] ?? 1;
        $number_per_page = $params['number_per_page'] ?? Pagination::DEFAULT_NUMBER_PER_PAGE;


        $query->setFields($entity::getTable().".*");

        $query->setNumberPerPage( $number_per_page )->setPage($currentPage);


        if(isset($params['orderby'])){
            $query->setOrderBy($params['orderby']);
        }

        if(isset($params['order'])){
            $query->setOrder($params['order']);
        }

        if( isset($params['where']) ){

            $query->setWhere($params['where']);
        }


        $data = $query->getAll();
        $pagination = $query->getPagination();






      /*  Response::addVariable(
            [
                "title"         =>  "Lista ".$entity::getEntityName(),
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ],
                "application_info"  =>  [
                    "icon"   =>  static::getIcon("actionMod"),
                    "title"   =>  static::getTitle("actionList"),
                    "description"   =>  static::getDescription("actionList")
                ]
            ]
        );
      */

        return [
            "list",[
                "title"         =>  "Lista ".$entity::getEntityName(),
                "data"      => $data,
                "entity"    =>  $entity,
                "fields"    =>  $entity::schema(),
                "pagination"    =>  $pagination,
                "query" =>  $query,
                "url"=> $params['current_url'],
                "routeParams"   =>  $params['routeParams'] ?? []
            ]
        ];
    }


    static function actionDelete( $params =[]){
        $entity = static::getEntityClass();
        $entity::findById($params['id'])->remove();

        return Response::redirect(
            RouterService::getRoute($entity::getEntity().".list")->build()
        );

    }




    static function getForSelect($label="",$id=""){



        $entity = static::getEntityClass();



        $tt = $entity::query()->getAll(true);



        $options = [];
        $options[] = [
            "label" =>  "---scegli---",
            "value"=> ""
        ];
        foreach ($tt as $item) {
            $options[] = [
                "label" =>  $item->$label,
                "value" =>  $item->$id
            ];
        }
        return $options;
    }

    static function actionActivate($params){
        $entity = static::getEntityClass();
        if( isset($params['id']) ) {
            $data = $entity::findById($params['id']);
            $data->__active__ = 1;
            $data->save();

            RouterService::getRoute($entity::getEntity().".mod")->go([
                "id"    =>  $params['id']
            ]);
            exit;
        }
    }


    static function actionDeactivate($params){


        $entity = static::getEntityClass();
        if( isset($params['id']) ) {



            $data = $entity::findById($params['id']);
            $data->__active__ = 0;
            $data->save();

            RouterService::getRoute($entity::getEntity().".mod")->go([
                "id"    =>  $params['id']
            ]);


            exit;
        }
    }

    static function getDescription( $method = "" )
    {
        return "";
    }
    static function getTitle( $method = "" )
    {
        return "";
    }
    static function getIcon( $method = "" )
    {
        return "";
    }


    static function search($params)
    {
        $s = $params['s'];
        $c = static::getEntityClass();
        $db = Db::$connection;

        if ($c !== null) {

            $sql = "select *   from " . $c::getTable() . " where 1=1 AND (";
            $where = [];
            $whereValues = [];
            foreach ($c::schema() as $key => $value) {
                if (strpos($value->getData()["Type"], "int") !== false) {

                } else {
                    $where[] = "$key LIKE :$key";
                    $whereValues[$key] = "%$s%";
                }
            }
            $sql .= implode(" OR ", $where) . ")";

            $rr = $db->fetchAll($sql, $whereValues);
            return $rr;
        }
        return [];
    }


    static function actionExport( $params = [] ){

        $entity = static::getEntityClass();
        $schema = $entity::schema();
        $query = $entity::query(true)->setFields(  implode(",",array_keys(static::getExportableFields())));




        foreach ($params as $k => $p){
            if(isset($schema[$k])){
                /**
                 * @var $field Field
                 */
                $field = $schema[$k];
                $value = $field->getInsertValue($p);
                $query->where("$k=$value");
            }
        }

        $data = $query->getAll();



        Response::$templates['csv'] = new CSVTemplate(null,null);
        Response::setTemplateToUse("csv");
        return ["csv",array_merge($params,[

            "data"=>$data
        ])];

        exit;
    }

    static function actionImport( $params = []){
        $entity = static::getEntityClass();

        return [
            "import",[
                "importSaveUrl"   => RouterService::getRoute($entity.".import.save")->build(),
                "fields"    =>  self::getExportableFields(),
                "extraValues" => isset($params['extraValues']) ? $params['extraValues'] : [],
                "extraConditions" => isset($params['extraConditions']) ? $params['extraConditions'] : [],
                "mappatura" => isset($params['mappatura']) ? $params['mappatura'] : [],
                "campoprimario"=>isset($params['campoprimario']) ? $params['campoprimario'] : []
            ]
        ];
    }

    static function remove_utf8_bom($text)
    {
        $bom = pack('H*','EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }


    static function actionImportSave( $params = [], $post = []){



        $fieldNamesCSV = [];
        $valuesInCSV = [];

        $mappatura = $post['mappatura'];

        $row = 0;
        if( ($handle = fopen($_FILES['csvToImport']['tmp_name'],"r"))  !== false){
            $first = true;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $data=static::remove_utf8_bom($data);
                if($first){
                    $fieldNamesCSV = $data;
                    $first = false;
                }else{
                    $valuesInCSV[]=$data;
                }

                $row++;

            }
            fclose($handle);
        }




        foreach ($valuesInCSV as $key=>$value){
            $a = [];
            foreach ($fieldNamesCSV as $k=>$v){
                $a[$v] = isset($value[$k]) ? $value[$k] : "";
            }





            $valori = [];

            foreach ($a as $key=>$value){
                $nn = trim(str_replace("ï»¿","",$key));
                $nn = trim($nn);
                $nn= str_replace (array("\r\n", "\n", "\r"), ' ', $nn);


                $a[$nn] = $value;
            }

            foreach ($mappatura as $key=>$value){

                $nn = trim(str_replace("ï»¿","",$key));
                $nn = trim($nn);
                $nn= str_replace (array("\r\n", "\n", "\r","%0D","%0A"), '', $nn);
                $nn = trim($nn, " \t\n\r\0\x0B");


                $mappatura[$nn] = $value;
            }

            foreach ($a as $key=>$value){



                if(isset($mappatura[$key])){

                    if(isset($post['converters']) && isset($post['converters'][$mappatura[$key]])){

                        $newval =  $post['converters'][$mappatura[$key]]($value);

                        $value = $newval;
                    }



                    $valori[$mappatura[$key]] = $value;
                }else{
                    if( isset($post['binders']) && isset($post['binders'][$key]) ){
                        $valori = array_merge_recursive($valori,$post['binders'][$key]($value));

                    }
                }
            }


            if(isset($post['fixedValues'])){
                foreach ($post['fixedValues'] as $key=>$value){
                    $valori[$key] = $value;
                }
            }





            if($post['comportamento'] == 'normale'){


                if(!empty($post['campoprimario'])) {


                    $nomeCampoPrimario = $mappatura[$post['campoprimario']];
                    $origCampoPrimario =trim(str_replace("ï»¿","",$post['campoprimario']));


                    $valoreDaTrovare = $a[$origCampoPrimario];





                    $query = static::getEntityClass()::query(true);

                    $fieldPrimario = static::getEntityClass()::schema()[$nomeCampoPrimario];

                    $query->where($nomeCampoPrimario."=".$fieldPrimario->getInsertValue($valoreDaTrovare));




                    //$find = "findBy" . ucfirst($nomeCampoPrimario);
                    $entity = static::getEntityClass();
                    $entityToSave = new $entity();



                    if(isset($post['extraConditions'])){

                        $query = $post['extraConditions']($query,$a);
                    }

                    /*if(isset($post['extraConditions'])){
                        if(isset($post['extraConditions']['where'])){


                            $query->where($post['extraConditions']['where']);
                        }
                        if(isset($post['extraConditions']['joins'])){
                            $query->mergeJoins($post['extraConditions']['joins']);
                        }

                    }*/





                    $e = $query->getOne();



                    //$e = static::getEntityClass()::$find($valoreDaTrovare);


                    if (!empty($e)) {
                        $entityToSave = $e;
                        /*
                        foreach ($e as $ee) {


                            $entityToSave = $ee;

                        }*/




                        $entityToSave->buildProperties($valori);


                        if(isset($post['preSave'])){
                            $entityToSave = $post['preSave']($entityToSave);
                            if(!$entityToSave){
                                continue;
                            }
                        }

                        if($entityToSave){
                            $entityToSave->save();
                        }


                        if(isset($post['postSave'])){

                            $post['postSave']($a,$valori,$entityToSave);
                        }


                    }else{

                        $entityToSave->buildProperties($valori);


                        if(isset($post['preSave'])){

                            $entityToSave = $post['preSave']($entityToSave);
                        }






                        try {
                            $entityToSave->insert();
                        }catch (\Exception $e){

                            echo $e->getMessage();
                            var_dump($entityToSave);
                            exit;
                        }

                        if(isset($post['postSave'])){

                            $post['postSave']($a,$valori,$entityToSave);
                        }



                    }


                }else{
                    $entity = static::getEntityClass();
                    $entityToSave = new $entity();


                    $entityToSave->buildProperties($valori);


                    $entityToSave->save();
                }

            }elseif($post['comportamento'] == "sovrascrivi"){
                if(!empty($post['campoprimario'])) {
                    $valoreDaTrovare = $a[$post['campoprimario']];

                    $find = "findBy" . ucfirst($post['campoprimario']);
                    $entity = static::getEntityClass();
                    $entityToSave = new $entity();
                    $e = static::getEntityClass()::$find($valoreDaTrovare);
                    if (!empty($e)) {
                        $entityToSave = $e;
                        $entityToSave->buildProperties($a);
                        $entityToSave->save();
                    }

                }
            }elseif ($post['comportamento'] == 'sincronizza'){

            }

        }




        return Response::redirect( RouterService::getRoute(static::getEntityClass().".list")->build(),null);


        exit;
    }

    static function getExportableFields(){
        $fields = [];
        foreach(static::getEntityClass()::schema() as $k => $f ){
            /**
             * @var $f Field
             */

            if( ( $f->isEditable() && !$f->isReference() )  || $f->primary){
                $fields[$k] = $f;
            }
        }

        return $fields;
    }




}