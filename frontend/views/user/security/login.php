<style type="text/css">
  
.center {
  padding: 200px 0;
  text-align: center;
}
.p-t-136 {
    padding-top: 10px !important;
}
.wrap-login100 {
    padding: 120px 130px 120px 95px !important;
}
</style>

<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;
use dektrium\user\widgets\Connect;

$this->title = 'Sign In';

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/loginAsset');

?>
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-pic js-tilt" data-tilt>
                    <br/>
                    <img src="<?= $dirAssests?>/images/img-01.png" alt="IMG">
                </div>

                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
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
                    <?= $form->field($model, 'login', ['template' => '
                           <div class="wrap-input100">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                              {input}
                           </div>
                           {error}{hint}
                           '])->textInput(['placeholder' => $model->getAttributeLabel('login'), 'class' => 'input100'])
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
                    <div class="container-login100-form-btn">
                        <?= Html::submitButton('Login', ['class' => 'login100-form-btn', 'name' => 'submit']) ?>
                    </div>

                    <div class="text-center p-t-12">
                        <?= Html::a('Forgot Password?', ['/user/forgot'], ['class' => 'txt1']) ?>
                    </div>

                    
                    <div class="text-center p-t-136">
                        <?= Html::a('Create your Account', ['/user/registration/register'], ['class' => 'txt2']) ?>
                        <!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
		
		
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
