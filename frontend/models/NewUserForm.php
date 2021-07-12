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

    /**
     * @inheritdoc
     */
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
        // $label['role'] = 'Pilih Kategori Pengguna';
        $label['username'] = 'Email';
        // $label['fullname'] = 'Nama Penuh';
        $label['password'] = 'Kata Laluan';
        $label['password_repeat'] = 'Ulang Kata Laluan';
        return $label;
    }
}
