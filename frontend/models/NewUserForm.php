<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
use common\models\User;
/**
 * Signup form
 */
class NewUserForm extends Model
{
    public $password;
    public $password_repeat;
    public $username;
    public $email;

    public $password2;
    public $username2;
    /**
     * @inheritdoc
     */
    public function rules()
    {

        $rules = parent::rules();
        
        //Register
        $rules['usernameLength']  = ['username', 'email'];
        $rules['usernameRequired'] = ['username', 'required', 'on' => 'register'];
        $rules['passwordRequired'] = ['password', 'required', 'on' => 'register'];
        $rules['password_repeatRequired'] = ['password_repeat', 'required', 'on' => 'register'];
        $rules['password_repeatCompare'] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];

        //Login
        $rules['username2Length']  = ['username2', 'email'];
        $rules['username2Required'] = ['username2', 'required', 'on' => 'login'];
        $rules['password2Required'] = ['password2', 'required', 'on' => 'login'];

        return $rules;
    }
	
	public function attributeLabels()
    {
        $label = parent::attributeLabels();

        $label['username'] = 'Email';
        $label['password'] = 'Password';
        $label['password_repeat'] = 'Repeat Password';

        $label['username2'] = 'Email';
        $label['password2'] = 'Password';
        return $label;
    }
}
