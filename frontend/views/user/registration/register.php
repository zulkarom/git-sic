<style type="text/css">
  
.center {
  padding: 200px 0;
  text-align: center;
}
.wrap-login100 {
    padding: 120px 130px 120px 95px !important;
}
.p-t-136 {
    padding-top: 30px !important;
}
</style>

<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/loginAsset');

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <br/><br/><br/><br/>
                    <img src="<?= $dirAssests?>/images/img-01.png" alt="IMG">

                </div>

                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        Register
                    </span>

                <?php $form = ActiveForm::begin([
                    'id' => 'signup-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                ]); ?>
                    
                       <?= $form->field($model, 'role', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->dropDownList(Common::role(), ['prompt' => 'Select User Category', 'class' => 'input100', 'style' => 'height:50px !important'])
                        ?>
                        <?= $form->field($model, 'username', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->textInput(['placeholder' => $model->getAttributeLabel('username'), 'class' => 'input100'])
                        ?>
                        <?= $form->field($model, 'fullname', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->textInput(['placeholder' => $model->getAttributeLabel('fullname'), 'class' => 'input100'])
                        ?>
                        <?= $form->field($model, 'password', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->passwordInput(['placeholder' => 'Password', 'class' => 'input100'])
                        ?>
                        <?= $form->field($model, 'password_repeat', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->passwordInput(['placeholder' => 'Repeat your password', 'class' => 'input100'])
                        ?>
                   
                     
                
                    <div class="container-login100-form-btn">
                        <?= Html::submitButton('Sign up', ['class' => 'login100-form-btn', 'name' => 'submit']) ?>
                    </div>

                    
                    <div class="text-center p-t-136">
                        <?= Html::a('Go to Login Page <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>', ['/user/security/login'], ['class' => 'txt2']) ?>
                        <!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

