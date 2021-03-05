<?php

namespace app\models;

use yii\base\Model;

class Login extends Model
{
    public $login;
    public $password;

    public function rules(){
        return[
            [['login','password'],'required'],
            ['login','string','min'=>2,'max'=>10],
            ['password','string','min'=>2,'max'=>10],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute,$param){
        
        if(!$this->hasErrors()){ // if haven't validation mistakes
            $user = $this->getUser();
            // echo date('Y-m-d H:i:s'); die();
            if( !$user || ($user->validatePassword($this->password))){
                $this->addError($attribute,'Login or password is incorrect!');
            }
        }
    }

    public function getUser(){
        return User::findOne(['login'=>$this->login]);
    }
}
