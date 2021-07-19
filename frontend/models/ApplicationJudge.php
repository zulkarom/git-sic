<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "app_judge".
 *
 * @property int $id
 * @property int $application_id
 * @property int $judge_id
 */
class ApplicationJudge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_judge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id'], 'required'],
            [['application_id', 'judge_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'judge_id' => 'Judge',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'judge_id']);
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
