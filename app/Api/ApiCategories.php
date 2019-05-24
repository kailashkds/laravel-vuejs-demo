<?php

/* 
 * This Api is for getiing all categories pagaination wise
 * 
 * @author Kailash sharma
 */
namespace App\Api;

use Log;

class ApiCategories extends \App\Api\ApiAbstractHelper
{

    public function setParams($params) {
        if($params['offset']){
            $this->offset = $params['offset'];
        }
        if($params['count']){
            $this->count = $params['count'];
        }
        $this->requestUrl = $this->baseUrl.'/api/categories?' . http_build_query(['offset'=>$this->offset,'count'=>$this->count]);
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
        return ['id'=>'','title'=>'','clues_count'=>0]; 
    }
}