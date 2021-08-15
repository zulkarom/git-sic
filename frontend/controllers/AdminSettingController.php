<?php

namespace frontend\controllers;

use Yii;
use common\models\Model;
use frontend\models\Application;
use frontend\models\ApplicationItem;
use frontend\models\AdminApplicationSearch;
use frontend\models\ApplicationReviewer;
use frontend\models\ApplicationJudge;
use frontend\models\UploadFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\db\Exception;
use yii\db\Expression;
use frontend\models\Website;
use frontend\models\Timeline;
use frontend\models\Categories;

/**
 * AdminApplicationController implements the CRUD actions for Application model.
 */
class AdminSettingController extends Controller
{

    public $layout = "//main-admin";
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex()
    {
        $website = Website::findOne(1);
        
        if ($website->load(Yii::$app->request->post())) {
            
            if($website->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->refresh();

            }
        }
        

        return $this->render('index', compact('website'));
    }
    
    public function actionPayment()
    {
        $website = Website::findOne(2);
        
        if ($website->load(Yii::$app->request->post())) {
            
            if($website->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->refresh();
                
            }
        }
        
        
        return $this->render('payment', compact('website'));
    }
    
    public function actionRequirement()
    {
        $website = Website::findOne(4);
        
        if ($website->load(Yii::$app->request->post())) {
            
            if($website->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->refresh();
                
            }
        }
        
        
        return $this->render('requirement', compact('website'));
    }
    
    public function actionContact()
    {
        $website = Website::findOne(5);
        
        if ($website->load(Yii::$app->request->post())) {
            
            if($website->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->refresh();
                
            }
        }
        
        return $this->render('contact', compact('website'));
    }
    
    public function actionDates()
    {
        $dates = Timeline::find()->all();
        
        if (Yii::$app->request->post()) {
            
            if (Model::loadMultiple($dates, Yii::$app->request->post()) && Model::validateMultiple($dates)) {
                foreach ($dates as $date) {
                    $date->save(false);
                }
                Yii::$app->session->addFlash('success', "Data Updated");

                return $this->refresh();
            }
            
        }
        
        
        return $this->render('dates', compact('dates'));
    }
    
    public function actionCategories()
    {
        $categories = Categories::find()->all();
        
        if (Yii::$app->request->post()) {
            
            if (Model::loadMultiple($categories, Yii::$app->request->post()) && Model::validateMultiple($categories)) {
                foreach ($categories as $category) {
                    $category->save(false);
                }
                Yii::$app->session->addFlash('success', "Data Updated");
                
                return $this->refresh();
            }
            
        }
        
        
        return $this->render('categories', compact('categories'));
    }

}
