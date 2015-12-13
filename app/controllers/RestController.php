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
use yii\rest\ActiveController;
class RestController extends ActiveController
{
    public $modelClass = 'app\models\User';
}
