<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Application;
use frontend\models\ApplicationItem;
use frontend\models\ApplicationSearch;
use frontend\models\ApplicationPaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use common\models\Model;
use yii\db\Exception;
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
        $app = Application::find()
        ->where(['user_id' => Yii::$app->user->identity->id])->all();
        if($app){
            if( count($app) == 1){
                $a = $app[0];
                return $this->redirect(['view', 'id' => $a-> id]);
            }
            
        }else{
            return $this->redirect(['create']);
        }

        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPayment()
    {
        $app = Application::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->andWhere(['>', 'status', 0])
        ->all();
        if($app){
            if( count($app) == 1){
                $a = $app[0];
                
                    if($a->payment_at){
                        return $this->redirect(['payment-view', 'id' => $a-> id]);
                    }else{
                        return $this->redirect(['payment-create', 'id' => $a-> id]);
                    }

            }
            
        }
        
        $searchModel = new ApplicationPaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('payment', [
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
    
    public function actionPaymentView($id)
    {
        return $this->render('payment-view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionPaymentFree($id)
    {
        return $this->render('payment-free', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionPaymentCreate($id)
    {
        $model = $this->findModel($id);
        
       /*  if($model->category != 1){
            return $this->redirect(['payment-free', 'id' => $model-> id]);
        } */

        
        
        $model->scenario = 'payment';

        if ($model->load(Yii::$app->request->post())) {
            $model->payment_at = new Expression('NOW()');
            $model->status = 50;

            if($model->uploadPaymentFile()){
                Yii::$app->session->addFlash('success', "Thank you, your payment information has been successfully submitted");
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->flashError();
            }

        }


        return $this->render('payment-create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		/* if(!Application::isOpen()){
			return $this->redirect(['close']);
		} */
        $model = new Application();
        $model->scenario = 'apply';
        $items = [new ApplicationItem];

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        if ($model->load(Yii::$app->request->post())) {
            //print_r(Yii::$app->request->post());die();

            $action = Yii::$app->request->post('btn-submit');

            if($action == 'draft'){
                $model->status = 0;
            }else if($action == 'submit'){
                $model->status = 10;
            }
            $model->created_at = new Expression('NOW()');
            $model->user_id = Yii::$app->user->identity->id;
            
            $result = $this->processApplication($model, $items);
           // print_r($result[0]);die();
            if($result[0]){
                if($model->status == 10){
                    Yii::$app->session->addFlash('success', "Thank you, your application has been successfully submitted");
                }else{
                    Yii::$app->session->addFlash('success', "Application saved");
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $items = $result[1];
            }
        }

        return $this->render('create', [
            'model' => $model,
            'items' => $items,
        ]);
    }
	
	public function actionClose()
    {
        return $this->render('close');
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
      //echo $valid;die();

        if ($valid) {
           // echo 'in valid' ;
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)){
                        //echo 'save model ok' ; die();
                            if (! empty($deletedIDs)) {
                                ApplicationItem::deleteAll(['id' => $deletedIDs]);
                            }
                                foreach ($items as $item) {
                                    $item->application_id = $model->id;
                                    if (! ($flag = $item->save(false))) {
                                        
                                        $transaction->rollBack();
                                        break;
                                    }else{
                                        
                                    }
                                }

                            
                    }else{
                        //echo 'save model ko' ; die();
                        $model->flashError();
                    }
                    if ($flag) {
                        $transaction->commit();
                        return [true];
                        
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    $transaction->rollBack();
                }
            }     

        return [false, $items];
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

        if ($model->load(Yii::$app->request->post())) {

            $action = Yii::$app->request->post('btn-submit');
            if($action == 'draft'){
                $model->status = 0;
            }else if($action == 'submit'){
                $model->status = 10;
            }
            
            $model->updated_at = new Expression('NOW()');

            $result = $this->processApplication($model, $items);
            // print_r($result[0]);die();
            if($result[0]){
                if($model->status == 10){
                    Yii::$app->session->addFlash('success', "Thank you, your application has been successfully submitted");
                }else{
                    Yii::$app->session->addFlash('success', "Application saved");
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $items = $result[1];
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

    public function actionPaymentFile($id){
        $model = $this->findModel($id);
        
        UploadFile::downloadPayment($model);
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
    
    public function actionProfile()
    {
        $model = Yii::$app->user->identity;
        $model->scenario = 'update';
        $model->updated_at = new Expression('NOW()');
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->rawPassword){
                $model->setPassword($model->rawPassword);
            }
            

            
            if($model->save()){
                
                Yii::$app->session->addFlash('success', "Profile Updated");
                return $this->refresh();
            }else{
                $model->flashError();
            }
            
            
            
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
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
