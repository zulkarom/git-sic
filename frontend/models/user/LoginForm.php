<?php
namespace frontend\models\user;

use dektrium\user\models\LoginForm as BaseLoginForm;

/**
 * Login form
 */
class LoginForm extends BaseLoginForm
{
	public $role;
	
	public function rules()
    {
        $rules = parent::rules();
        $rules[]  = ['role', 'required'];
       
		$rules[]  = ['login', 'email'];
		$rules[]  = ['role', 'validateRole'];
        return $rules;
    }
	
	public function attributeLabels()
    {
		$labels = parent::attributeLabels();
		$labels['login'] = 'Email';
        return $labels;
    }
    
    public function validateRole($attribute, $params, $validator)
    {
        if(!User::checkRoleExistByUsername($this->login, $this->role)){
            $this->addError($attribute, 'Sila pilih fungsi yang berkenaan sahaja.');
        }
    }
    
    
}
