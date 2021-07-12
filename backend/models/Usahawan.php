<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "usahawan".
 *
 * @property int $id
 * @property int $user_id
 * @property int $age
 * @property string $address
 * @property string $location
 * @property string $profile_file
 */
class Usahawan extends \yii\db\ActiveRecord
{
    public $u_longitude;
    public $u_latitude;
    public $u_location;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usahawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'address', 'postcode', 'city', 'state', 'location'], 'required', 'on' => 'insert'],
            //Profile image
            ['profile_file', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],

            [['user_id', 'age'], 'integer'],
            [['address', 'u_location', 'u_longitude', 'u_latitude', 'longitude', 'latitude', 'location'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'age' => 'Age',
            'address' => 'Address',
            'location' => 'Location',
            'profile_file' => 'Profile File',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
