<?php

namespace app\controllers;

use Yii;
use yii\easyii\modules\page\models\Page;
use yii\web\Controller;

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
        if(!Yii::$app->getModule('admin')->installed){
            return $this->redirect(['/install/step1']);
        }
        return $this->render('index');
    }
    public function actionLogin()
    {
        $connection =  \Yii::$app->db;
        $loginForm  =  new \yii\easyii\models\LoginForm();
    }
//    public function action
}