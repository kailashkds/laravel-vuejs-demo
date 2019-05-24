<?php

/* 
 * This is a Abstract class for All api called at http://jservice.io/
 * 
 * @author kailash sharma 
 */
namespace App\Api;
use Log;

abstract class ApiAbstractHelper
{
    /**
     * @var baseUrl
     */
    protected $baseUrl = 'http://jservice.io/';

    /**
     * @var requestUrl
     */
    protected $requestUrl;

    /**
     * @var paramsArray
     */
    protected $paramsArray = [];
    
    /**
     * @var header
     */
    protected $header;

    /**
     * @var curlOptions
     */
    protected $curlOptions;
    
    /**
     * @var count
     */
    protected $count = 10;

    /**
     * @var offset
     */
    protected $offset = 0;
    
    /**
     * Set requestUrl
     *
     * @param $params
     */
    abstract public function setParams($params);
    
    /**
     * return object
     *
     */
    abstract public function convertResponseToArray($data);

    /**
     * Set header
     *
     * @param $header
     */
    public function setHeader()
    {
        $this->header = array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
        );
    }

    /**
     * Set curlOptions
     *
     */
    public function setCurlOptions()
    {
        $this->curlOptions = array(
                                CURLOPT_URL => $this->requestUrl,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_HTTPHEADER => $this->header,
                                CURLOPT_SSL_VERIFYPEER => false,
                            );
    }

    /**
     * Set params,header,curlOptions
     *
     * @param $requestParams
     */
    public function init($requestParams)
    {
        $this->setParams($requestParams);
        $this->setHeader();
        $this->setCurlOptions();
    }

    /**
     * return response from Curl in Object
     *
     */
    public function getData()
    {
        $data = $this->process();
        Log::debug("Response->" . $data);
        return $this->convertResponseToArray(json_decode($data, true));
    }

    /**
     * Generate response from Curl
     *
     */
    public function process()
    {
        $curlHandler = curl_init();
        @curl_setopt_array($curlHandler, $this->curlOptions);
        $output = @curl_exec($curlHandler);
        if (curl_errno($curlHandler)) {
            return json_encode(['error' => 'request Error:' . curl_error($curlHandler)]);
        }
        curl_close($curlHandler);
        return $output;
    }
}