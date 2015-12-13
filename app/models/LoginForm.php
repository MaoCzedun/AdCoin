<?php
/**
 * Description of LoginForm
 *
 * @author Дом
 */
namespace app\models;
use app\components\helpers\ProffstoreCURL;
class LoginForm  extends \yii\base\Model
{
    public $email;
    public $password;
    public function login()
    {
        $proffstore = new ProffstoreCURL();
        $proffstore->auth($this->password, $this->email);
        if($proffstore->accesToken)
        {
            $user = \app\models\User::findOne(['email'=>$this->email]);
            if($user){
                $user->setAttribute('tocken',$proffstore->accesToken);
                $user->update(false);
            }
            else
            {
                $user->setAttributes([
                    'email'=>$this->email,
                    'pass'=>$this->password,
                    'tocken'=>$proffstore->accesToken   
                ]);
                $user->save(false); 
            }
            \Yii::$app->user->login($user,3600*24*3);
            return true;
        }
        else
        {
            return false;       
        }
        
    }
    
    public function rules() {
        return [
            [['email'],'email'],
            [['email','password'],'filter','filter'=>function($val){
                return strip_tags($val);
            }]
        ];
    }
}
