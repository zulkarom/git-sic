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
	
	public function actionJoinUs(){

        $this->layout = "//main-login";

        if (!\Yii::$app->user->isGuest) {
            //$this->goHome();
            return $this->user_redirect();
        }
        
        $model = new NewUserForm();
        // $model->scenario = 'register';
        
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->refresh();
        }


        $modelLogin = new SignInForm();
        // $modelLogin->scenario = 'login';

        if ($modelLogin->load(Yii::$app->request->post()) && $modelLogin->login()){
            return $this->user_redirect();
        }
        
        
        return $this->render('join-us', [
            'model' => $model,
            'modelLogin' => $modelLogin,
        ]);
    }
    
    private function user_redirect(){
        if(Yii::$app->user->identity->is_admin == 1){
            return $this->redirect(['/admin-application/index']);
        }else if(Yii::$app->user->identity->is_judge == 1){
            return $this->redirect(['/reviewer-application/index']);
        }else if(Yii::$app->user->identity->is_reviewer == 1){
            return $this->redirect(['/judge-application/index']);
        }else{
            return $this->redirect(['/application/index']);
        }
    }
	

}
