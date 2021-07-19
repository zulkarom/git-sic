<?php

namespace frontend\models\user; 

use Yii;

class User extends \dektrium\user\models\User
{
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'fullname';
        $scenarios['update'][]   = 'fullname';
        $scenarios['register'][] = 'fullname';
		$scenarios['connect'][] = 'fullname';
		$scenarios['settings'][] = 'fullname';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        
        $rules['fullnameRequired'] = ['fullname', 'required', 'on' => ['register', 'create', 'connect', 'update']];
		
		$rules['institutionRequired'] = ['institution', 'required', 'on' => ['register']];
		
		$rules['fullnameLength']   = ['fullname', 'string', 'min' => 3, 'max' => 255];
		
        
        return $rules;
    }
	
	public function attributeLabels(){
		$arr = parent::attributeLabels();
		// $arr['fullname'] = "Nama Penuh";
		return $arr;
	}
	
	public function register(){
		$this->status = self::STATUS_ACTIVE;
		return parent::register();
	}
}

?>