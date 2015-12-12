<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Дом
 */
class User extends yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{$users}}';
    }
    public function attributeLabels() {
        parent::attributeLabels();
    }
}
