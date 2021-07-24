<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ApplicationJudge;
use frontend\models\ApplicationItem;
use frontend\models\JudgeApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use frontend\models\UploadFile;
/**
 * JudgeApplicationController implements the CRUD actions for ApplicationJudge model.
 */
class JudgeApplicationController extends Controller
{
    public $layout = "//main-judge";
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
     * Lists all ApplicationJudge models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgeApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApplicationJudge model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        if(is_null($model->judge_at)){
            return $this->redirect(['update', 'id' => $id]);
        }

        $model->scenario = 'comment';
        
        if ($model->load(Yii::$app->request->post())) {
            $model->judge_at = new Expression('NOW()');
            
            if($model->upload()){
                Yii::$app->session->addFlash('success', "Your information has been successfully submitted");
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->flashError();
            }
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        
        $model->scenario = 'comment';
        
        if ($model->load(Yii::$app->request->post())) {
            $model->judge_at = new Expression('NOW()');
            
            if($model->upload()){
                Yii::$app->session->addFlash('success', "Your information has been successfully submitted");
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->flashError();
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    

    public function actionJudgeFile($id){
        $model = $this->findModel($id);
        
        UploadFile::downloadJudgeFile($model);
    }

    /**
     * Finds the ApplicationJudge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApplicationJudge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplicationJudge::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
