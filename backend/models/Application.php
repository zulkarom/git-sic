<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $category
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
 * @property string $medium
 * @property string|null $reference
 * @property int $aggrement_disclaimer
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends \yii\db\ActiveRecord
{
    public $cur_logo;
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
            [['applicant_name', 'nationality', 'id_number', 'gender', 'age', 'phoneNo', 'officeNo', 'faxNo', 'email', 'instiBusName', 'type', 'address', 'project_name', 'project_description', 'aggrement_disclaimer', 'created_at'], 'required'],

            [['gender', 'age', 'aggrement_disclaimer'], 'integer'],

            [['logo_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,gif,pdf', 'maxSize' => 2000000],

            [['project_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['category', 'medium'], 'string', 'max' => 10],
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

    public function upload(){
        $uploadFile = UploadedFile::getInstance($this, 'logo_file');
        //Yii::$app->session->addFlash('success', "Dalam sedia ada");
        if($uploadFile){
           //die('dalam upload file');
          // Yii::$app->session->addFlash('success', "Dalam upload file");
            $year = date('Y') + 0 ;
            $path = $year.'/'.$this->id .'/';
            $directory = Yii::getAlias('@upload/application/'.$path);
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            $ext = $uploadFile->extension;
            $filename = 'file.'.$ext;
            $this->logo_file = $path. $filename; 
            
            if($uploadFile->saveAs($directory.'/'. $filename)){
                $this->save();
                return true;
            }
        }else if($this->cur_logo){
            $this->logo_file = $this->cur_logo;
            $this->save();
            //Yii::$app->session->addFlash('success', "Dalam sedia ada");
            return true;
        }

        
        return false;
    }

    public static function sendFile($file, $filename, $ext){
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: inline; filename=" . $filename);
        header("Content-Type: " . self::mimeType($ext));
        header("Content-Length: " . filesize($file));
        header("Content-Transfer-Encoding: binary");
        readfile($file);
        exit;
    }

    public static function mimeType($ext){
        switch($ext){
            case 'pdf':
            $mime = 'application/pdf';
            break;
            
            case 'zip':
            $mime = 'application/zip';
            break;
            
            case 'jpg':
            case 'jpeg':
            $mime = 'image/jpeg';
            break;
            
            case 'gif':
            $mime = 'image/gif';
            break;
            
            case 'png':
            $mime = 'image/png';
            break;
            
            default:
            $mime = '';
            break;
        }
        
        return $mime;
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
