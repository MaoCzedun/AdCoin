<?php

namespace app\controllers;
use app\components\helpers\ProffstoreCURL;
use app\models\User;
class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTest()
    {
        var_dump(User::findIdentity(2));
//        $proffstoreClient =  new ProffstoreCURL();
//        $proffstoreClient->auth('ap23029514', 'alexpetrov5@mail.ru');
//        if($proffstoreClient->accesToken)
//        {
//            var_dump($proffstoreClient->accesToken);
//        }
//        else
//        {
//            var_dump($proffstoreClient->errors);
//        }
        
    }

}
