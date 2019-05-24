<?php

/* 
 * This Api is for getiing all categories pagaination wise
 * 
 * @author Kailash sharma
 */
namespace App\Api;

use Log;

class ApiClues extends \App\Api\ApiAbstractHelper
{
    /**
     *
     * @var int
     */
    protected $category=0;
    
    public function setParams($params) {
        if($params['offset']){
            $this->offset = $params['offset'];
        }
        if($params['category']){
            $this->category = $params['category'];
        }
        $this->requestUrl = $this->baseUrl.'/api/clues?' . http_build_query(['offset'=>$this->offset,'category'=>$this->category]);
        Log::debug('Request url: '.$this->requestUrl);
        return true;
    }
    
    public function convertResponseToArray($data) {
        if(isset($data['error'])){
            return $data;
        }
        if(count($data)){
            return $data;
        }
        return ['id'=>'','question'=>'','answer'=>'','category'=>['title'=>'']]; 
    }
}