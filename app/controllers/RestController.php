<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestController
 *
 * @author Дом
 */
namespace app\controllers;
use app\models\LoginForm;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
class RestController extends ActiveController
{
    public $modelClass = 'app\models\User';
    
    public function init() {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
    public function actionLogin()
    {
        
            $loginForm  =  new LoginForm();
            if($loginForm->load(\Yii::$app->request->post()))
            {
                $token  = $loginForm->login();
                if($token)
                {
                    return json_encode(['tocken'=>$token]);
                }
                else
                {
                    return json_encode(
                        [
                            'errors'=>[
                                'password'=>'Неправильны email или пароль',
                                'email'=>'Неправильны email или пароль'
                            ]
                        ]
                    );
                }
            }    
        
        
        
    }
    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' =>  HttpBearerAuth::className(),
            'except'=>['login']
        ];
        return $behaviors;
    }

    public function actionTest()
    {
        return json_encode([\Yii::$app->user->isGuest]);
    }
            
}
