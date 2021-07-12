<?php

namespace frontend\controllers;

use Yii;
use frontend\models\user\User;
use frontend\models\NewUserForm;
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
        if ($model->load(Yii::$app->request->post())){

        	$action = Yii::$app->request->post('submit');

        	$checkUser = User::findOne(['username' => $model->username]);

        	if($action == 1){

        		if($checkUser){
        			echo 'hi';
        		die();
        			return $this->redirect(array('/user/login', 'param1'=> $model->username, 'param2'=> $model->password));
        		}else{
        			Yii::$app->session->addFlash('danger', "Akaun anda belum berdaftar dengan sistem ini.");
        		}

        	}else if($action == 2){
        		if($checkUser){
        			Yii::$app->session->addFlash('danger', "Akaun anda telah berdaftar dengan sistem ini.");
        		}else{
        			return $this->redirect(array('/user/register', 'param1'=> $model->username, 'param2'=> $model->password, 'param3'=> $model->password_repeat));
        		}
        	}

        	// if($checkUser){
        	//     if(User::checkRoleExistByUsername($model->username, $model->role)){
        	//         Yii::$app->session->addFlash('danger', "Akaun anda telah berdaftar dengan sistem ini.");
        	//     }else{
    	    //         if ($model->signup()) {
    	    //             Yii::$app->session->addFlash('success', "Pendaftaran Berjaya");
    	    //             return $this->redirect(['register2']);
    	    //         }else{
    	    //             Yii::$app->session->addFlash('danger', "Pendaftaran Gagal.");
    	    //         }
    	    //    }
        	// }else{
        	// 	return $this->redirect(array('/user/register', 'param1'=> $model->username, 'param2'=> $model->role));
        	// }

        }
        
        return $this->render('/user/registration/index', [
            'model' => $model,
        ]);
    }
	
	public function actionRegister2(){
		$this->layout = "//main-login";
        return $this->render('/user/registration/register2', [
        ]);
    }
	

}
