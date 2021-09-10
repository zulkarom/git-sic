<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Expression;
use yii\filters\AccessControl;
/**
 * UserListController implements the CRUD actions for User model.
 */
class UserListController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLoginAs($user){
        if(Yii::$app->user->identity->is_admin == 1){
            $user = User::findIdentity($user);
            $original = Yii::$app->user->identity->id;
            if(Yii::$app->user->login($user)){
                $session = Yii::$app->session;
                $session->set('or-usr', $original);
                return $this->redirect(['application/index']);
            }
        }
        
    }
    
    public function actionReturnRole()
    {
        $session = Yii::$app->session;
        if ($session->has('or-usr')){
            $id = $session->get('or-usr');
            $user = User::findIdentity($id);
            if(Yii::$app->user->login($user)){
                $session->remove('or-usr');
                return $this->redirect(['admin-application/index']);
            }
            
        }else{
            throw new NotFoundHttpException('The requested page does not exist..');
        }
        
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->rawPassword){
                $model->setPassword($model->rawPassword);
            }
            
            $model->username = $model->email;
            
            if($model->active == 1){
                $model->status = 10;
            }else{
                $model->status = 9;
            }
            
            $model->created_at = new Expression('NOW()');
            $model->updated_at = new Expression('NOW()');
            
            if($model->save()){
                Yii::$app->session->addFlash('success', "A new user added");
                return $this->redirect(['index']);

            }
            
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $model->updated_at = new Expression('NOW()');

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->rawPassword){
                $model->setPassword($model->rawPassword);
            }
            if($model->active == 1){
                $model->status = 10;
            }else{
                $model->status = 9;
            }
            
            $model->username = $model->email;
            if($model->save()){
                
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->redirect(['index']);
            }else{
                $model->flashError();
            }
            
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionAssignRole($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'assign';
        $model->updated_at = new Expression('NOW()');

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->save()){
                Yii::$app->session->addFlash('success', "Role Assign");
                return $this->redirect(['index']);
            }else{
                $model->flashError();
            }
            
            
            
        } else {
            return $this->render('assign-role', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
