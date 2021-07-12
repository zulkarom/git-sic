<?php

namespace frontend\controllers;

use Yii;
use frontend\models\user\User;
use frontend\models\NewUserForm;
use frontend\models\SignInForm;
use frontend\models\user\RegistrationForm;

class UserFormController extends \yii\web\Controller
{
	// public function behaviors()
	// {
	// 	return [
	// 		'access' => [
	// 			'class' => AccessControl::className(),
	// 			'rules' => [
	// 				[
	// 					'allow' => true,
	// 					'roles' => ['@'],
	// 				],
	// 			],
	// 		],
	// 	];
	// }
	
	public function actionRegister(){

        $this->layout = "//main-login";
        
        $model = new NewUserForm();
        $model->scenario = 'register';

        if ($model->load(Yii::$app->request->post())){
        	// echo "<pre>";
        	// print_r(Yii::$app->request->post());
        	// die();

        	$action = Yii::$app->request->post('submit');

        	$checkUser = User::findOne(['username' => $model->username]);

        	if($action == 2){
        		
        		if($checkUser){
        			Yii::$app->session->addFlash('danger', "Akaun anda telah berdaftar dengan sistem ini.");
        		}else{
        			return $this->redirect(array('/user/register', 'param1'=> $model->username, 'param2'=> $model->password, 'param3'=> $model->password_repeat));
        		}
        	}
        }

        $modelLogin = new SignInForm();
        $modelLogin->scenario = 'login';

        if ($modelLogin->load(Yii::$app->request->post())){
        	// echo "<pre>";
        	// print_r(Yii::$app->request->post());
        	// die();

        	$action = Yii::$app->request->post('submit');

        	$checkUser = User::findOne(['username' => $modelLogin->username]);

        	if($action == 1){
        		if($checkUser){
        			
        			// return $this->redirect(array('/user/login', 'param1'=> $modelLogin->username2, 'param2'=> $modelLogin->password2));

        			return $this->redirect(array('/user/login', 'param1'=> $modelLogin->username, 'param2'=> $modelLogin->password));
        		}else{
        			Yii::$app->session->addFlash('danger', "Akaun anda belum berdaftar dengan sistem ini.");
        		}

        	}
        }
        
        return $this->render('/user/registration/index', [
            'model' => $model,
            'modelLogin' => $modelLogin,
        ]);
    }
	
	public function actionRegister2(){
		$this->layout = "//main-login";
        return $this->render('/user/registration/register2', [
        ]);
    }
	

}
