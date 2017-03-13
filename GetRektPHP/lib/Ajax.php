<?php

namespace Lib;

class Ajax {
    
    private $apiUrl = "http://172.16.14.91:8000/pollsAPI/";
    
    function __construct($apiUrl = "") {
        $this->apiUrl = isset($apiUrl) && !empty($apiUrl) ? $this->apiUrl . $apiUrl ."/": $this->apiUrl;
    }
    
    public function get($sParams) {
        $sUrl = $this->apiUrl . $sParams . "/";
//        var_dump($sUrl);exit;
        
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $sUrl,
        ));
        
        $result = curl_exec($ch);
        
        
        curl_close($ch);
        
        return $result;
        
    }
    
    public function post($url, $sParams) {
        
//        var_dump($sParams);exit;
        
        $sUrl = $this->apiUrl.$url."/";
//        var_dump($sUrl); exit;
        
        //open connection
        $ch = curl_init();
        
        curl_setopt_array($ch, array(
            CURLOPT_URL => $sUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $sParams,
        ));

        //execute post
        $result = curl_exec($ch);
        
        var_dump($result);exit;

        //close connection
        curl_close($ch);
    }
    
    public static function arrayToQueryString($array) {
 
        $sParams = "";
        foreach($array as $key=>$value) {
            $sParams .= $key . '=' . $value . '&';
        }
        rtrim($sParams, '&');
          
        return $sParams;
    }
    
    
}
