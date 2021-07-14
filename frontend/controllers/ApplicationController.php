<?php

namespace frontend\controllers;

use Yii;
use backend\models\Application;
use backend\models\ApplicationItem;
use frontend\models\ApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Model;

/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class ApplicationController extends Controller
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

    /**
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "//main-login";

        $searchModel = new ApplicationSearch();
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "//member";
        $model = new Application();
        $items = [new ApplicationItem];

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        if ($model->load(Yii::$app->request->post())) {

            echo "<pre>";
            print_r(Yii::$app->request->post());
            die();

            if($this->processInvoice($model, $items)){
                Yii::$app->session->addFlash('success', "Application Submit");
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    private function processInvoice($model, $items){
        $oldIDs = ArrayHelper::map($items, 'id', 'id');
        $items = Model::createMultiple(ApplicationItem::classname(), $items);
        Model::loadMultiple($items, Yii::$app->request->post());
        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($items, 'id', 'id')));
        
        // validate all models
        $valid = $model->validate();
        $valid = Model::validateMultiple($items) && $valid; 

        if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)){
                            if (! empty($deletedIDs)) {
                                ApplicationItem::deleteAll(['id' => $deletedIDs]);
                            }
                            if($flag = $model->upload()){
                                foreach ($items as $item) {
                                    $item->application_id = $model->id;
                                    if (! ($flag = $item->save(false))) {
                                        $transaction->rollBack();
                                        break;
                                    }
                                }
                            }
                            
                    }else{
                        $model->flashError();
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }      

        return false;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
