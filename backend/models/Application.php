<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $category
 * @property string $applicant_name
 * @property string $nationality
 * @property string $id_number
 * @property int $gender
 * @property int $age
 * @property string $phoneNo
 * @property string $officeNo
 * @property string $faxNo
 * @property string $email
 * @property string $instiBusName
 * @property string $type
 * @property string $address
 * @property string $logo_file
 * @property string $project_name
 * @property string $project_description
 * @property int $medium
 * @property string|null $reference
 * @property int $aggrement_disclaimer
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'applicant_name', 'nationality', 'id_number', 'gender', 'age', 'phoneNo', 'officeNo', 'faxNo', 'email', 'instiBusName', 'type', 'address', 'logo_file', 'project_name', 'project_description', 'medium', 'aggrement_disclaimer', 'created_at', 'updated_at'], 'required'],
            [['category', 'gender', 'age', 'medium', 'aggrement_disclaimer'], 'integer'],
            [['project_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['applicant_name', 'nationality', 'email', 'instiBusName', 'type', 'address', 'logo_file', 'project_name'], 'string', 'max' => 225],
            [['id_number'], 'string', 'max' => 15],
            [['phoneNo', 'officeNo', 'faxNo'], 'string', 'max' => 50],
            [['reference'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'applicant_name' => 'Applicant Name',
            'nationality' => 'Nationality',
            'id_number' => 'Id Number',
            'gender' => 'Gender',
            'age' => 'Age',
            'phoneNo' => 'Phone No',
            'officeNo' => 'Office No',
            'faxNo' => 'Fax No',
            'email' => 'Email',
            'instiBusName' => 'Insti Bus Name',
            'type' => 'Type',
            'address' => 'Address',
            'logo_file' => 'Logo File',
            'project_name' => 'Project Name',
            'project_description' => 'Project Description',
            'medium' => 'Medium',
            'reference' => 'Reference',
            'aggrement_disclaimer' => 'Aggrement Disclaimer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
