<?php
namespace frontend\models\user;

//use dektrium\user\models\User;
use Yii;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use backend\models\Usahawan;
use backend\models\Supplier;

/**
 * Signup form
 */
class RegistrationForm extends BaseRegistrationForm
{
	// public $fullname;
	// public $role;
	public $password_repeat;
	
	public function rules()
    {
        $rules = parent::rules();
		
		$rules['usernameLength']  = ['username', 'email'];

		$rules['password_repeatRequired'] = ['password_repeat', 'required'];
		
		$rules['password_repeatCompare'] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];
		

		//
        return $rules;
    }
	
	public function attributeLabels()
    {
		$label = parent::attributeLabels();
	
		$label['username'] = 'Email';

		$label['password'] = 'Kata Laluan';
		$label['password_repeat'] = 'Ulang Kata Laluan';
        return $label;
    }
	
	public function register()
    {
        if (!$this->validate()) {
            return false;
        }

       
        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;

        }
			
	        Yii::$app->session->setFlash(
	            'info',
	            Yii::t(
	                'user',
	                'Your account has been created and a message with further instructions has been sent to your email'
	            )
	        );
	        return true;
    }
}
