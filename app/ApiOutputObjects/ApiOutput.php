<?php

namespace App\ApiOutputObjects;

class ApiOutput {

    /**
     * @var total
     */
    protected $total = 999;

    /**
     * @var per_page
     */
    protected $per_page = 10;

    /**
     *
     * @var int
     */
    protected $last_page = 10;

    /**
     *
     * @var string
     */
    protected $first_page_url = "";

    /**
     *
     * @var string
     */
    protected $last_page_url = "";

    /**
     *
     * @var string
     */
    protected $next_page_url = "";

    /**
     *
     * @var string
     */
    protected $path = "";

    /**
     *
     * @var int
     */
    protected $from = 1;

    /**
     *
     * @var int
     */
    protected $to = 10;

    /**
     *
     * @var array
     */
    protected $data = [];

    /**
     * 
     * @return int
     */
    function getTotal() {
        return $this->total;
    }

    /**
     * 
     * @return string
     */
    function getPer_page() {
        return $this->per_page;
    }

    /**
     * 
     * @return string
     */
    function getLast_page() {
        return $this->last_page;
    }

    /**
     * 
     * @return string
     */
    function getFirst_page_url() {
        return $this->first_page_url;
    }

    /**
     * 
     * @return string
     */
    function getLast_page_url() {
        return $this->last_page_url;
    }

    /**
     * 
     * @return string
     */
    function getNext_page_url() {
        return $this->next_page_url;
    }

    /**
     * 
     * @return string
     */
    function getPath() {
        return $this->path;
    }

    /**
     * 
     * @return int
     */
    function getFrom() {
        return $this->from;
    }

    /**
     * 
     * @return int
     */
    function getTo() {
        return $this->to;
    }

    /**
     * 
     * @return array
     */
    function getData() {
        return $this->data;
    }

    /**
     * 
     * @param \App\ApiOutputObjects\total $total
     */
    function setTotal(total $total) {
        $this->total = $total;
    }

    /**
     * 
     * @param \App\ApiOutputObjects\per_page $per_page
     */
    function setPer_page(per_page $per_page) {
        $this->per_page = $per_page;
    }

    /**
     * 
     * @param type $last_page
     */
    function setLast_page($last_page) {
        $this->last_page = $last_page;
    }

    /**
     * 
     * @param type $first_page_url
     */
    function setFirst_page_url($first_page_url) {
        $this->first_page_url = $first_page_url;
    }

    /**
     * 
     * @param type $last_page_url
     */
    function setLast_page_url($last_page_url) {
        $this->last_page_url = $last_page_url;
    }

    /**
     * 
     * @param type $next_page_url
     */
    function setNext_page_url($next_page_url) {
        $this->next_page_url = $next_page_url;
    }

    /**
     * 
     * @param type $path
     */
    function setPath($path) {
        $this->path = $path;
    }

    /**
     * 
     * @param type $from
     */
    function setFrom($from) {
        $this->from = $from;
    }

    /**
     * 
     * @param type $to
     */
    function setTo($to) {
        $this->to = $to;
    }

    /**
     * 
     * @param type $data
     */
    function setData($data) {
        $this->data = $data;
    }

    /**
     * 
     * @param type $data
     */
    function setAllData($data) {
        $this->from = $data['page'] * $this->per_page;
        $this->to = ($data['page'] + 1) * $this->per_page;
        $this->data = $data['data'];
    }

    /**
     * 
     * @return array $data
     */
    function getAllData() {
        return ['total' => $this->total,
                'per_page' => $this->per_page,
                'last_page' => $this->last_page,
                'first_page_url' => $this->first_page_url,
                'last_page_url' => $this->last_page_url,
                'next_page_url' => $this->next_page_url,
                'path' => $this->path,
                'from' => $this->from,
                'to' => $this->to,
                'data' => $this->data];
    }

}
