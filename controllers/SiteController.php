<?php

namespace app\controllers;

use app\models\Login;
use yii\web\Controller;
use app\models\Sign_up;
use app\models\User;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $model = new User();
            
            return $this->render('index',[
            'model' => $model
        ]); 
        }

        $login_model = new Login();
       
        if(isset($_POST['Login'])){
            $login_model->attributes = Yii::$app->request->post('Login');

            if($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login',[
            'login_model' => $login_model
        ]);
    }

    public function actionSign_up()
    {
        $model = new Sign_up();

        if(isset($_POST['Sign_up'])){
            // var_dump($_POST['Sign_up']);die();
            $model->attributes = Yii::$app->request->post('Sign_up');

            if($model->validate() && $model->sign_up()){
                return $this->goHome();
            }
        }

        return $this->render('sign_up',[
            'model' => $model
        ]);
    }

    public function actionLogout(){
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
            return $this->redirect(['index']);
        }
    }
}
