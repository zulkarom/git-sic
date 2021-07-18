<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
use common\models\User;
/**
 * Signup form
 */
class SignInForm extends Model
{
    public $password;
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        // $rules = parent::rules();
        
        $rules['usernameLength']  = ['username', 'email'];
        $rules['usernameRequired'] = ['username', 'required'];
        $rules['passwordRequired'] = ['password', 'required'];


        return $rules;
    }
	
	public function attributeLabels()
    {
        $label = parent::attributeLabels();

        $label['username'] = 'Email';
        $label['password'] = 'Password';

        return $label;
    }
}
