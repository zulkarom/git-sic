<?php

namespace frontend\controllers\user;

use Yii;
use dektrium\user\controllers\SecurityController as BaseSecurityController;
use frontend\models\user\LoginForm;
use common\models\User;

class SecurityController extends BaseSecurityController
{
    public function actionLogin()
    {
        $this->layout = "//main-login";

        $request = Yii::$app->request;

        $username = $request->get('param1');
        $password = $request->get('param2');
        $role = $request->get('param3');

        // echo $password;
        // die();

        if (!\Yii::$app->user->isGuest) {
            //$this->goHome();
            $this->redirect(['/application/index']);
        }

        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $model->login = $username;
        $model->password = $password;

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);
        // echo $role;
        // die();
        if ($model->login()) {
            if($role == 0){
                return $this->redirect(['/admin-application/index']);
            }else if($role == 1){
                return $this->redirect(['/application/index']);

            }
            //$this->goHome();
            
            //return $this->goBack();
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
        
    }
	
	public function actionLogout()
    {
        $event = $this->getUserEvent(\Yii::$app->user->identity);

        $this->trigger(self::EVENT_BEFORE_LOGOUT, $event);

        \Yii::$app->getUser()->logout();

        $this->trigger(self::EVENT_AFTER_LOGOUT, $event);

        return $this->redirect(['/user/login']);
    }
}
