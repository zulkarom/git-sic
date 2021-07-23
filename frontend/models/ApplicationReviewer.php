<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use frontend\models\Application;
/**
 * This is the model class for table "app_reviewer".
 *
 * @property int $id
 * @property int $application_id
 * @property int $reviewer_id
 */
class ApplicationReviewer extends \yii\db\ActiveRecord
{
    public $reviewFile;
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
            [['review_note', 'review_file', 'review_at'], 'required', 'on' => 'comment'],

            [['review_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,gif,pdf', 'maxSize' => 2000000],

            [['application_id', 'reviewer_id'], 'integer'],
            [['review_note'], 'string'],
            [['created_at', 'review_at'], 'safe'],
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

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'reviewer_id']);
    }

    public function getApplication(){
        return $this->hasOne(Application::className(), ['id' => 'application_id']);
    }

    public function upload(){
        $uploadFile = UploadedFile::getInstance($this, 'review_file');
        if($uploadFile){

            $year = date('Y') + 0 ;
            $path = $year.'/'.$this->application_id .'/';
            $directory = Yii::getAlias('@uploaded/application/'.$path);
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            $ext = $uploadFile->extension;
            $filename = 'fileReview.'.$ext;
            $this->review_file = $path. $filename; 
            
            if($uploadFile->saveAs($directory.'/'. $filename)){
                $this->save();
                return true;
            }
        }else if($this->reviewFile){
            $this->review_file = $this->reviewFile;
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
