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
class User extends yii\db\ActiveRecord implements yii\web\IdentityInterface
{
    public static function tableName()
    {
        return '{{%users}}';
    }
    public function attributeLabels() {
        return [
            'email'=>'Эллектронный адрес',
            'pass'=>'Пароль',
            'balance'=>'баланс кошелька',
            'bitcoin_wallet'=>'Bitcoin кошелек',
            'token'=>'Токен авторизации',
            'id'=>'id'
        ];
    }

    public function getAuthKey() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        
    }

    public static function findIdentity($id) {
        return User::findOne([':id'=>$id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        
    }

}
