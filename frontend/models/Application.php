<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\models\Common;
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
 * @property int $medium_web
 * @property int $medium_email
 * @property int $medium_others
 * @property string|null $reference
 * @property int $aggrement_disclaimer
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends \yii\db\ActiveRecord
{
    public $cur_logo;
    public $paymentFile;
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
            [['category', 'applicant_name', 'nationality', 'id_number', 'gender', 'age', 'phoneNo', 'email', 'instiBusName', 'type', 'address', 'project_name', 'project_description', 'medium_web', 'medium_email', 'medium_others', 'aggrement_disclaimer'], 'required', 'on' => 'apply'],
            
            [['payment_at', 'payment_note', 'payment_file'], 'required', 'on' => 'payment'],
            
            ['aggrement_disclaimer', 'validateAgreement', 'on' => 'apply'],

            [['logo_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,gif,pdf', 'maxSize' => 2000000],
            
            [['payment_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,gif,pdf', 'maxSize' => 2000000],

            [['category', 'gender', 'age', 'aggrement_disclaimer', 'status', 'user_id'], 'integer'],
            [['project_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['applicant_name', 'nationality', 'instiBusName', 'type', 'address', 'logo_file', 'project_name'], 'string', 'max' => 225],
            [['id_number'], 'string', 'max' => 15],
            [['phoneNo', 'officeNo', 'faxNo'], 'string', 'max' => 50],
            [['reference'], 'string', 'max' => 100],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Choose Your Category',
            'applicant_name' => 'Applicant Name',
            'nationality' => 'Nationality',
            'id_number' => 'Identity document/Passport No. ',
            'gender' => 'Gender',
            'age' => 'Age',
            'phoneNo' => 'Mobile No',
            'officeNo' => 'Office No',
            'faxNo' => 'Fax No',
            'email' => 'Email',
            'instiBusName' => 'Institution/Business Name ',
            'type' => 'Type of Business',
            'address' => 'Address',
            'logo_file' => 'Logo File',
            'project_name' => 'Project / Idea Name',
            'project_description' => 'Project /Idea Description',
            'medium_web' => 'Medium Web',
            'medium_email' => 'Medium Email',
            'medium_others' => 'Medium Others',
            'reference' => 'Reference',
            'aggrement_disclaimer' => 'Declaration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function validateAgreement($attribute, $params, $validator)
    {
        if ($this->$attribute != 1) {
            $this->addError($attribute, 'You need to agree with this terms');
        }
    }
    

    public function getCategoryText(){
        $arr = Common::category();
        if(array_key_exists($this->category,$arr)){
            return $arr[$this->category];
        }
        
    }

    public function getGenderText(){
        $arr = Common::gender();
        if(array_key_exists($this->gender,$arr)){
            return $arr[$this->gender];
        }
    }

    public function getApplicationJudge(){
        return $this->hasMany(ApplicationJudge::className(), ['application_id' => 'id']);
    }

    public function getApplicationReviewer(){
        return $this->hasMany(ApplicationReviewer::className(), ['application_id' => 'id']);
    }

    public function getCountry(){
        return $this->hasOne(Countries::className(), ['id' => 'nationality']);
    }

    public function getApplicationStatus(){
        return $this->hasOne(ApplicationStatus::className(), ['status' => 'status']);
    }

    public function getApplicationItems(){
        return $this->hasMany(ApplicationItem::className(), ['application_id' => 'id']);
    }

    public function getStatusLabel(){
        return '<span class="label label-'.$this->applicationStatus->color.' ">'.strtoupper($this->applicationStatus->name).'</span>';
    }
    
    public function getStatusText(){
        return strtoupper($this->applicationStatus->name);
    }

    public function upload(){
        $uploadFile = UploadedFile::getInstance($this, 'logo_file');
        //Yii::$app->session->addFlash('success', "Dalam sedia ada");
        if($uploadFile){
           //die('dalam upload file');
          // Yii::$app->session->addFlash('success', "Dalam upload file");
            $year = date('Y') + 0 ;
            $path = $year.'/'.$this->id .'/';
            $directory = Yii::getAlias('@uploaded/application/'.$path);
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

    public function uploadPaymentFile(){
        $uploadFile = UploadedFile::getInstance($this, 'payment_file');
        //Yii::$app->session->addFlash('success', "Dalam sedia ada");
        if($uploadFile){
           //die('dalam upload file');
          // Yii::$app->session->addFlash('success', "Dalam upload file");
            $year = date('Y') + 0 ;
            $path = $year.'/'.$this->id .'/';
            $directory = Yii::getAlias('@uploaded/application/'.$path);
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            $ext = $uploadFile->extension;
            $filename = 'filePayment.'.$ext;
            $this->payment_file = $path. $filename; 
            
            if($uploadFile->saveAs($directory.'/'. $filename)){
                $this->save();
                return true;
            }
        }else if($this->paymentFile){
            $this->payment_file = $this->paymentFile;
            $this->save();
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
