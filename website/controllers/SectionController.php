<?php

namespace website\controllers;

use Yii;
use backend\modules\website\models\Section;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadFile;
/**
 * SectionController implements the CRUD actions for Section model.
 */
class SectionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionSectionImage($id){
        $model = Section::findOne($id);
        
        UploadFile::sectionImage($model);
    }
}
