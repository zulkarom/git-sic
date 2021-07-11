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
	public $fullname;
	// public $role;
	public $password_repeat;
	
	public function rules()
    {
        $rules = parent::rules();
		
		$rules['usernameLength']  = ['username', 'email'];
		
        // $rules['fullnameRequired'] = ['fullname', 'required'];

        // $rules['roleRequired'] = ['role', 'required'];

		$rules['password_repeatRequired'] = ['password_repeat', 'required'];
        $rules['fullnameLength']   =  ['fullname', 'string', 'min' => 3, 'max' => 255];
		
		$rules['password_repeatCompare'] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];
		

		//
        return $rules;
    }
	
	public function attributeLabels()
    {
		$label = parent::attributeLabels();
		// $label['role'] = 'Pilih Kategori Pengguna';
		$label['username'] = 'Email';
		// $label['fullname'] = 'Nama Penuh';
		$label['password'] = 'Kata Laluan';
		$label['password_repeat'] = 'Ulang Kata Laluan';
        return $label;
    }
	
	public function register()
    {
    	// echo $this->password_repeat;
    	// die();
    	$this->email = $this->username;
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);
        $this->email = $this->username;

        if (!$user->register()) {
            return false;
        }
	        
       	// $user->role = $this->rol;
        if($user->role == 1){
				$usahawan = new Usahawan;
				// $client->scenario = "register";
				$usahawan->user_id = $user->id;
				$usahawan->save(); 
			}else if($user->role == 2){
				$supplier = new Supplier;
				// $expert->scenario = "register";
				$supplier->user_id = $user->id;
				$supplier->save(); 
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
