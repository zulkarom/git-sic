<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "application_status".
 *
 * @property int $id
 * @property int $status
 * @property string $name
 * @property string $color
 */
class ApplicationStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'name', 'color'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'name' => 'Name',
            'color' => 'Color',
        ];
    }
}
