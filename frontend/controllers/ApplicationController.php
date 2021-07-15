<?php

namespace frontend\controllers;

use Yii;
use backend\models\Application;
use backend\models\ApplicationItem;
use frontend\models\ApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use common\models\Model;
use yii\db\Expression;
use frontend\models\UploadFile;

/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class ApplicationController extends Controller
{
    public $layout = "//member";
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
        $items = ApplicationItem::find()->where(['application_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
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
        $items = [new ApplicationItem];

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        if ($model->load(Yii::$app->request->post())) {

            $action = Yii::$app->request->post('btn-submit');

            $model->status = $action;
            $model->created_at = new Expression('NOW()');
            $model->user_id = Yii::$app->user->identity->id;

            if($this->processApplication($model, $items)){
                Yii::$app->session->addFlash('success', "Application Submit");
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    private function processApplication($model, $items){
        $oldIDs = ArrayHelper::map($items, 'id', 'id');
        $items = Model::createMultiple(ApplicationItem::classname(), $items);
        Model::loadMultiple($items, Yii::$app->request->post());
        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($items, 'id', 'id')));
        
        // echo "<pre>";
        //  print_r($deletedIDs);
        // die();
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
        $items = $model->applicationItems;

        $model->cur_logo = $model->logo_file;
        $model->user_id = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post())) {

            $action = Yii::$app->request->post('btn-submit');
            $model->status = $action;
            $model->updated_at = new Expression('NOW()');

            if($this->processApplication($model, $items)){
                
                Yii::$app->session->addFlash('success', "Application Updated");
                return $this->redirect(['view', 'id' => $id]);

            }

        }

        return $this->render('update', [
            'model' => $model,
            'items' => (empty($items)) ? [new ApplicationItem] : $items
        ]);
    }

    public function actionLogoImage($id){
        $model = $this->findModel($id);
        
        UploadFile::downloadLogo($model);
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
