<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\NewUserForm;
use frontend\models\SignInForm;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use frontend\models\VerifyEmailForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'index', 'error', 'verify-email', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error') $this->layout ='error';
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

       return $this->render('index');
        
    }
    
    public function actionLogin(){
        
        $this->layout = "//main-login";
        
        if (!\Yii::$app->user->isGuest) {
            //$this->goHome();
            return $this->user_redirect();
        }
        
        $model = new NewUserForm();
        // $model->scenario = 'register';
        
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->refresh();
        }
        
        
        $modelLogin = new SignInForm();
        // $modelLogin->scenario = 'login';
        
        if ($modelLogin->load(Yii::$app->request->post()) && $modelLogin->login()){
            return $this->user_redirect();
        }
        
        
        return $this->render('login', [
            'model' => $model,
            'modelLogin' => $modelLogin,
        ]);
    }
    
    private function user_redirect(){
        if(Yii::$app->user->identity->is_admin == 1){
            return $this->redirect(['/admin-application/index']);
        }else if(Yii::$app->user->identity->is_judge == 1){
            return $this->redirect(['/judge-application/index']);
            
        }else if(Yii::$app->user->identity->is_reviewer == 1){
            return $this->redirect(['/reviewer-application/index']);
        }else{
            return $this->redirect(['/application/index']);
        }
    }
    
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->verifyEmail()) {
                Yii::$app->session->setFlash('success', 'Thank you, your email has been confirmed. You can now login to submit your application');
                return $this->redirect(['/site/login']);
        }
        
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->redirect(['/site/login']);
    }
    
    public function actionRequestPasswordReset()
    {
        $this->layout = "//main-login";
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                
                return $this->redirect(['/site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    
    public function actionResetPassword($token)
    {
        $this->layout = "//main-login";
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Your new password has been successfully created.');
            
            return $this->redirect(['/site/login']);
        }
        
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'You have been logged out');
        return $this->redirect(['/site/login']);
    }


	
}
