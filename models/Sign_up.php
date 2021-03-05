<?php

namespace app\models;

use yii\base\Model;

class Sign_up extends Model
{
  public $login;
  public $password;
  public $date_of_birth;
  public $score;

  public function rules(){
      return[
          [['login','password','date_of_birth'],'required'],
          ['login','unique','targetClass'=>'app\models\User'],
          ['login','string','min'=>2,'max'=>10],
          ['password','string','min'=>2,'max'=>10],
        //   ['date_of_birth','validateDate_of_birth'],
          ['score','default', 'value' => 0]
      ];
  }

//   public function validateDate_of_birth($attribute,$param){
//     // echo date('Y-m-d H:i:s');
//     if(!$this->hasErrors()){ // if haven't validation mistakes
//         $date_of_birth = $this->date_of_birth;
        
//         if( ((date('Y-m-d H:i:s') - $date_of_birth) < 5 ) || ($date_of_birth->validateDate_of_birth($this->date_of_birth))){
//             $this->addError($attribute,'Too young!');
//         }
//         if( ((date('Y-m-d H:i:s') - $date_of_birth)  > 150 ) || ($date_of_birth->validateDate_of_birth($this->date_of_birth))){
//             $this->addError($attribute,'Too old!');
//         }
//     }
// }

  public function sign_up(){
      $user = new User();
      $user->login = $this->login;
      $user->setPassword($user->password);
      $user->date_of_birth = $this->date_of_birth;
      $user->score = 0;
      return $user->save();
  }
}