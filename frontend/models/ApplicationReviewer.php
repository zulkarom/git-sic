<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "app_reviewer".
 *
 * @property int $id
 * @property int $application_id
 * @property int $reviewer_id
 */
class ApplicationReviewer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_reviewer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'reviewer_id'], 'required'],
            [['application_id', 'reviewer_id'], 'integer'],
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
            'reviewer_id' => 'Reviewer',
        ];
    }
}
