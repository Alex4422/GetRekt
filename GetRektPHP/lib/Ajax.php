<?php

namespace Lib;

class Ajax {
    
    private $apiUrl = "http://172.16.14.91:8000/pollsAPI/";
    
    function __construct($apiUrl = "") {
        $this->apiUrl = isset($apiUrl) && !empty($apiUrl) ? $this->apiUrl . $apiUrl ."/": $this->apiUrl;
    }
    
    public function get($sParams = "") {
        $sUrl = $this->apiUrl;
        
        if (!empty($sParams)) {
            $sUrl .= $sParams . "/";
        }
//        var_dump($sUrl);exit;
        
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $sUrl,
        ));
        
        $result = curl_exec($ch);
        
        
        curl_close($ch);
        
        return json_decode($result);
        
    }
    
    public function post($url, $aParams) {
        
//        var_dump($sParams);exit;
            
        $sUrl = $this->apiUrl;
        if (!empty($url)) {
            $sUrl .= $url."/";
        }
        
        
//        var_dump($sUrl); exit;
        
        //open connection
        $ch = curl_init();
        
        curl_setopt_array($ch, array(
            CURLOPT_URL => $sUrl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $aParams,
            CURLOPT_RETURNTRANSFER => 1,
        ));

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        
//        var_dump($result);exit;

        //close connection
        
        return json_decode($result);
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
