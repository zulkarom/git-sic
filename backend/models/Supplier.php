<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property int $user_id
 * @property int $age
 * @property string $address
 * @property string $location
 * @property string $profile_file
 */
class Supplier extends \yii\db\ActiveRecord
{
    public $s_longitude;
    public $s_latitude;
    public $s_location;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
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
            [['address', 's_location', 's_longitude', 's_latitude', 'longitude', 'latitude', 'location'], 'string', 'max' => 225],
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
