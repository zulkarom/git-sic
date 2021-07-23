<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Application;
use frontend\models\ApplicationItem;
use frontend\models\AdminApplicationSearch;
use frontend\models\ApplicationReviewer;
use frontend\models\ApplicationJudge;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;

/**
 * AdminApplicationController implements the CRUD actions for Application model.
 */
class AdminApplicationController extends Controller
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
        $searchModel = new AdminApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Application model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $items = ApplicationItem::find()->where(['application_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
        ]);
    }

    public function actionManage($id)
    {
        $model = $this->findModel($id);
        $reviewer = new ApplicationReviewer();




        if ($model->load(Yii::$app->request->post())){

            if($model->save()){
                $flag = true;

                $reviewer_arr = Yii::$app->request->post('sel_reviewer');

                if($reviewer_arr){
                    //echo 'hai';die();
                    $kira_post = count($reviewer_arr);
                    $kira_lama = count($model->applicationReviewer);
                    if($kira_post > $kira_lama){
                        
                        $bil = $kira_post - $kira_lama;
                        for($i=1;$i<=$bil;$i++){
                            //print_r($reviewer_arr);die();
                            $insert = new ApplicationReviewer;
                            $insert->application_id = $model->id;
                            $insert->created_at = new Expression('NOW()');
                            if(!$insert->save()){
                                $flag = false;
                            }
                        }
                    }else if($kira_post < $kira_lama){

                        $bil = $kira_lama - $kira_post;
                        $deleted = ApplicationReviewer::find()
                          ->where(['application_id'=>$model->id])
                          ->limit($bil)
                          ->all();
                        if($deleted){
                            foreach($deleted as $del){
                                $del->delete();
                            }
                        }
                    }
                    
                    $update_reviewer = ApplicationReviewer::find()
                    ->where(['application_id' => $model->id])
                    ->all();
                    //echo count($reviewer_arr);
                    //echo count($update_access);die();

                    if($update_reviewer){
                        $i=0;
                        foreach($update_reviewer as $ut){
                            $ut->reviewer_id = $reviewer_arr[$i];
                            $ut->save();
                            $i++;
                        }
                    }
                }

                $judge_arr = Yii::$app->request->post('sel_judge');

                if($judge_arr){
                    //echo 'hai';die();
                    $kira_post = count($judge_arr);
                    $kira_lama = count($model->applicationJudge);
                    if($kira_post > $kira_lama){
                        
                        $bil = $kira_post - $kira_lama;
                        for($i=1;$i<=$bil;$i++){
                            //print_r($reviewer_arr);die();
                            $insert = new ApplicationJudge;
                            $insert->application_id = $model->id;
                            $insert->created_at = new Expression('NOW()');
                            if(!$insert->save()){
                                $insert->flashError();
                            }
                        }
                    }else if($kira_post < $kira_lama){

                        $bil = $kira_lama - $kira_post;
                        $deleted = ApplicationJudge::find()
                          ->where(['application_id'=>$model->id])
                          ->limit($bil)
                          ->all();
                        if($deleted){
                            foreach($deleted as $del){
                                $del->delete();
                            }
                        }
                    }
                    
                    $update_judge = ApplicationJudge::find()
                    ->where(['application_id' => $model->id])
                    ->all();
                    //echo count($reviewer_arr);
                    //echo count($update_access);die();

                    if($update_judge){
                        $i=0;
                        foreach($update_judge as $ut){
                            $ut->judge_id = $judge_arr[$i];
                            $ut->save();
                            $i++;
                        }
                    }
                }

            Yii::$app->session->addFlash('success', "Data Updated");
            }else{
                $model->flashError();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('manage', [
            'model' => $model,
            'reviewer' => $reviewer,
            'judge' => (empty($judge)) ? [new ApplicationJudge] : $judge
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Application();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $items = $model->applicationItems;

        return $this->render('update', [
            'model' => $model,
            'items' => (empty($items)) ? [new ApplicationItem] : $items
        ]);
    }

    /**
     * Deletes an existing Application model.
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
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
