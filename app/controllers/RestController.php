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
use app\models\User as US;
use yii\filters\auth\QueryParamAuth ;
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
                    return ['tocken'=>$token];
                }
                else
                {
                    return 
                        [
                            'errors'=>[
                                'password'=>'Неправильны email или пароль',
                                'email'=>'Неправильны email или пароль'
                            ]
                        ]
                    ;
                }
            }    
        
        
        
    }
    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' =>  QueryParamAuth ::className(),
            'tokenParam'=>'token',
            'except'=>['login','test'],
            
        ];
        return $behaviors;
    }

    public function actionTest()
    {
        
        return US::findIdentityByAccessToken('4f39779fd6acb266333ad658c317deb2390a8fde231447e2d8ae41079ff0a936');
    }
            
}
