<?php
namespace frontend\models\user;

use dektrium\user\models\LoginForm as BaseLoginForm;

/**
 * Login form
 */
class LoginForm extends BaseLoginForm
{
	
	public function rules()
    {
        $rules = parent::rules();
       
        $rules[]  = ['login', 'email'];
        return $rules;
    }
    
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['login'] = 'Email';
        return $labels;
    }
    
    // public function validateRole($attribute, $params, $validator)
    // {
    //     if(!User::checkRoleExistByUsername($this->login, $this->role)){
    //         $this->addError($attribute, 'Sila pilih fungsi yang berkenaan sahaja.');
    //     }
    // }
    
    
}
