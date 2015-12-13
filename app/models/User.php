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
namespace app\models;
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public function rules() {
        return [
            [['pass','email'],'required'],
            [['email'],'unique'],
            [['tocken'],'safe']
        ];
    }

    public static function tableName()
    {
        return 'easyii_adcoin_users';
    }
    public function attributeLabels() {
        return [
            'email'=>'Эллектронный адрес',
            'pass'=>'Пароль',
            'balance'=>'баланс кошелька',
            'bitcoin_wallet'=>'Bitcoin кошелек',
            'tocken'=>'Токен авторизации',
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
        return User::findOne(['id'=>$id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return User::findOne(['tocken'=>$token]);
    }
    public function isRoot()
    {
        return false;
    }
}
