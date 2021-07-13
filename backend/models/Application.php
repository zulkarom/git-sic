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
 * @property int $ic_number
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
            [['category', 'applicant_name', 'nationality', 'ic_number', 'gender', 'age', 'phoneNo', 'officeNo', 'faxNo', 'email', 'instiBusName', 'type', 'address', 'logo_file'], 'required'],
            [['category', 'ic_number', 'gender', 'age'], 'integer'],
            [['applicant_name', 'nationality', 'email', 'instiBusName', 'type', 'address', 'logo_file'], 'string', 'max' => 225],
            [['phoneNo', 'officeNo', 'faxNo'], 'string', 'max' => 20],
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
            'ic_number' => 'Ic Number',
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
        ];
    }
}
