<?php

namespace frontend\controllers\user;

use Yii;
use dektrium\user\models\RegistrationForm;
use dektrium\user\controllers\RegistrationController as BaseRegistrationController;

class RegistrationController extends BaseRegistrationController
{
    /**
     * Displays the registration page.
     * After successful registration if enableConfirmation is enabled shows info message otherwise
     * redirects to home page.
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionRegister()
    {
		$this->layout = "//main-login";

		$request = Yii::$app->request;

		$username = $request->get('param1');
		$password = $request->get('param2');
		$password_repeat = $request->get('param3');

		//echo "<pre>";
  		//print_r($request->get('param2'));
		//die();

		if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);
		
		$model->username = $username;
		$model->password = $password;
		$model->password_repeat = $password_repeat;
		$model->email = $username;

		// echo "<pre>";
		// print_r($model);
		// die();

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);
        }else{
        	$model->flashError();
        }
	}
	
	public function actionResend(){
		$this->layout = "//main-login";
		return parent::actionResend();
	}
	
	public function actionConfirm($id, $code){
		$this->layout = "//main-login";
		return parent::actionConfirm($id, $code);
	}

    
}
