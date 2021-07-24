<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ApplicationReviewer;
use frontend\models\ReviewerApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use frontend\models\ApplicationItem;
use yii\db\Expression;
use frontend\models\UploadFile;
/**
 * ReviewerApplicationController implements the CRUD actions for ApplicationReviewer model.
 */
class ReviewerApplicationController extends Controller
{
    public $layout = "//main-reviewer";
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
     * Lists all ApplicationReviewer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReviewerApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApplicationReviewer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $model->scenario = 'comment';
        
        if ($model->load(Yii::$app->request->post())) {
            $model->review_at = new Expression('NOW()');
            
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

    public function actionReviewFile($id){
        $model = $this->findModel($id);
        
        UploadFile::downloadReviewFile($model);
    }

    /**
     * Creates a new ApplicationReviewer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ApplicationReviewer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ApplicationReviewer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->scenario = 'comment';
        
        if ($model->load(Yii::$app->request->post())) {
            $model->review_at = new Expression('NOW()');
            
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

    /**
     * Deletes an existing ApplicationReviewer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplicationReviewer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApplicationReviewer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApplicationReviewer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
