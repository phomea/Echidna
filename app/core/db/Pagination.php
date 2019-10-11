<?php
namespace core\db;

use core\services\Request;
use core\services\RouterService;

class Pagination{
    const DEFAULT_NUMBER_PER_PAGE = 20;

    private $query;
    private $totalElements;
    private $totalPages;
    private $currentPage;
    private $perpage;

    private $currentUrl;

    /**
     * Pagination constructor.
     * @param $query Query
     */
    function __construct($query)
    {
        $this->query = $query;
        $this->totalElements = $query->count();
        $this->currentPage = $query->currentPage;
        $this->perpage = $query->getNumberPerPage();

        $this->totalPages = (int)ceil($this->totalElements / $this->perpage);
    }


    public function nextPageLink(){

    }

    public function getCurrentLink($paramsOverride = []){
        Request::getParamsClean();
        return RouterService::getRoute($this->query->getEntity().".list")->build(
            array_merge(
                Request::getParamsClean(),
                $paramsOverride
            )
        );
    }
    public function getPageLink($n){
        Request::getParamsClean();
        return RouterService::getRoute($this->query->getEntity().".list")->build(
            array_merge(
                Request::getParamsClean(),
                [
                    "page"  =>  $n
                ]
            )
         );
    }




    /**
     * @return bool|int|mixed
     */
    public function getTotalElements()
    {
        return $this->totalElements;
    }

    /**
     * @return int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getPerpage()
    {
        return $this->perpage;
    }


    /**
     * @return int
     */
    public function getShownElements()
    {
        return $this->totalPages > 1 ? $this->perpage : $this->totalElements;
    }
}