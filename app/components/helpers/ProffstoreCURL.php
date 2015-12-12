<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProffstoreCURL
 *
 * @author Дом
 */
namespace app\components\helpers;
class ProffstoreCURL {
    public  $accesToken;
    private $clientCode='192b975a2654';
    public  $errors;
    private $curl;
    public function ProffstoreCURL()
    {
        
    }
    /*

     * 
     * 
     *      */
    public function setOption($option,$value)
    {
        curl_setopt($this->curl,$option,$value);
    }
    public function auth($password,$useEmail)
    {
        $acceptableStatus=[200,201];
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_POST, true); // POST METHOD
        curl_setopt($this->curl, CURLOPT_URL, 'https://proffstore.com/api/v1/token');
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ["x-client-code: {$this->clientCode}"]);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, ['pass'=>$password,'email'=>$useEmail]);
        $result = json_decode(curl_exec($this->curl),true);
        if ($result && in_array(curl_getinfo($this->curl, CURLINFO_HTTP_CODE), $acceptableStatus)) 
        {
            $this->accesToken = $result['access_token'];  
        }
        else
        {
            $this->errors = [
                'status'=>curl_getinfo($this->curl, CURLINFO_HTTP_CODE),
                'textError'=>  curl_error($this->curl)
            ];      
        }
    }
}
