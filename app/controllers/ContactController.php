<?php

namespace app\controllers;
use app\components\helpers\ProffstoreCURL;
class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTest()
    {
        $proffstoreClient =  new ProffstoreCURL();
        $proffstoreClient->auth('ap23029514', 'alexpetrov5@mail.ru');
        if($proffstoreClient->accesToken)
        {
            var_dump($proffstoreClient->accesToken);
        }
        else
        {
            var_dump($proffstoreClient->errors);
        }
        
//        
//        $acceptableStatus=[200,201];
//        $clientCode='192b975a2654';
//        // IN this  code  we are , send 
//        $data = [
//                'email' => 'alexpetrov95@mail.ru',
//                'pass'  => 'ap23029514'
//            ];
//        try {
//            $curl = curl_init();
//            curl_setopt($curl, CURLOPT_POST, true); // POST METHOD
//            curl_setopt($curl, CURLOPT_URL, 'https://proffstore.com/api/v1/token');
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_HEADER, false);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($curl, CURLOPT_HTTPHEADER, ["x-client-code: $clientCode"]);
//            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//            $result = json_decode(curl_exec($curl),true);
//            var_dump($result['access_token']);
////            if ($result && in_array(curl_getinfo($curl, CURLINFO_HTTP_CODE), $acceptableStatus)) {
////                //well done
////                echo $result->access_token;
////            } else {
////                //something broke
////                echo 'Error: '.$result->error;
////            }
//
//            curl_close($curl);
//        }
//        catch(Exception $e){
//            throw new Exception("Invalid URL",0,$e);
//        }
    }

}
