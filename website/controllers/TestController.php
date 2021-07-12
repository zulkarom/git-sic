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
class TestController extends Controller
{

    public function actionIndex(){
        echo 'xxxxxxxxxxxxxxxxx';
    }
}
