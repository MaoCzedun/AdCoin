<?php

namespace app\controllers;

use Yii;
use yii\easyii\modules\page\models\Page;
use yii\web\Controller;
use app\models\LoginForm;
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = false;
//        if(!Yii::$app->getModule('admin')->installed){
//            return $this->redirect(['/install/step1']);
//        }
        return $this->render('indexHtml');
    }
    public function actionLogin()
    {
        $loginForm  =  new LoginForm();
        if($loginForm->load(\Yii::$app->request->post()))
        {
            if($loginForm->login())
            {
                $this->redirect('/site/index');
            }
            else
            {
                $loginForm->addErrors([
                    'password'=>'Неправильны email или пароль',
                    'email'=>'Неправильны email или пароль'
                ]);
            }
        }
        return $this->render('login',['model'=>$loginForm]);
    }
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->redirect('/site/index');
    }
}