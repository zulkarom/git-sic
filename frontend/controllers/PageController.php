<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;
/**
 * Site controller
 */
class PageController extends Controller
{
    public $layout = '//main-login';

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionRequirements()
    {

       return $this->render('requirements');
        
    }



}
