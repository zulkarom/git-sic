<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "application_item".
 *
 * @property int $id
 * @property int $application_id
 * @property string $name
 * @property string $idNumber
 * @property string $instiBusName
 * @property string $phoneNo
 * @property string $email
 */
class ApplicationItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'idNumber', 'instiBusName', 'phoneNo', 'email'], 'required'],
            [['application_id'], 'integer'],
            [['name', 'instiBusName', 'email'], 'string', 'max' => 225],
            [['idNumber'], 'string', 'max' => 15],
            [['phoneNo'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'idNumber' => 'Id Number',
            'instiBusName' => 'Insti Bus Name',
            'phoneNo' => 'Phone No',
            'email' => 'Email',
        ];
    }
}
