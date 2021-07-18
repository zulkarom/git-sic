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
    public $fullname;
    public $institution;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Register
            [['username'], 'email'],
            [['username', 'password', 'password_repeat', 'fullname', 'institution'], 'required'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        ];
    }
	
	public function attributeLabels()
    {
        $label = parent::attributeLabels();

        $label['username'] = 'Email';
        $label['password'] = 'Password';
        $label['password_repeat'] = 'Repeat Password';

        $label['fullname'] = 'Name';
        $label['institution'] = 'Institution';
        return $label;
    }

    public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }
    }
}
