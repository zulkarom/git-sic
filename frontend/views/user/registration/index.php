<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');

$this->title = 'Sign Up/Sign In';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php 
$fieldOptions1 = [
    'options' => ['class' => 'form-group'],
    'inputTemplate' => "{input}<span>*</span>"
];
?>

<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:40px;"> 
  
  <h2 style="padding-bottom:40px;text-align:center">LOGIN OR REGISTER TO SUBMIT OR VIEW YOUR APPLICATION.</h2>
  
    <!-- main body -->
    <!-- ################################################################################################ -->

    <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                ]) ?>
    <div class="sidebar one_half first"> 
        <h3>LOGIN</h3>
        
        <div class="row">
        <div class="col-md-10">
        
            <?= $form->field($modelLogin, 'username', ['template' => '
               <div class="form-group">
                    <label for="email">Email <span>*</span></label>
                  {input}
               </div>
               '])->textInput(['class' => 'form-control form-control-lg'])
            ?>
        
          <?= $form->field($modelLogin, 'password', ['template' => '
               <div class="form-group">
                    <label for="email">Password <span>*</span></label>
                  {input}
               </div>
               '])->passwordInput(['class' => 'form-control form-control-lg'])
            ?>

          <div class="form-group">
            <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Log in', ['value' => '1', 'class' => 'btn btn-danger', 'name' => 'submit']) ?>
          </div>

          <p class="text-center">
                <?= Html::a('Forget Password?',
                           ['/user/recovery/request'],['class' => 'field-label text-muted mb10', 'tabindex' => '5']
                                ) ?>
            </p>
        
        
        </div>
        <div></div>
        </div>
        
    </div>

<?php ActiveForm::end(); ?>


<?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>
    <div class="content one_half"> 

      <h3>REGISTER</h3>
      
      
      <div class="row">
        <div class="col-md-10">
        
          <?= $form->field($model, 'username', ['template' => '
               <div class="form-group">
                    <label for="email">Email <span>*</span></label>
                  {input}
               </div>
               '])->textInput(['class' => 'form-control form-control-lg'])
            ?>

            <?= $form->field($model, 'fullname', ['template' => '
               <div class="form-group">
                    <label for="email">Name <span>*</span></label>
                  {input}
               </div>
               '])->textInput(['class' => 'form-control form-control-lg'])
            ?>

            <?= $form->field($model, 'institution', ['template' => '
               <div class="form-group">
                    <label for="email">Institution <span>*</span></label>
                  {input}
               </div>
               '])->textInput(['class' => 'form-control form-control-lg'])
            ?>
        
          <?= $form->field($model, 'password', ['template' => '
               <div class="form-group">
                    <label for="email">Password <span>*</span></label>
                  {input}
               </div>
               '])->passwordInput(['class' => 'form-control form-control-lg'])
            ?>
            <?= $form->field($model, 'password_repeat', ['template' => '
               <div class="form-group">
                    <label for="email">Repeat Password <span>*</span></label>
                  {input}
               </div>
               '])->passwordInput(['class' => 'form-control form-control-lg'])
            ?>

          <div class="form-group">
            <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Register', ['value' => '2', 'class' => 'btn btn-danger', 'name' => 'submit']) ?>
          </div>
        
        
        </div>
        <div></div>
        </div>
        
      
      
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <!-- ################################################################################################ -->
    </div>
    <?php ActiveForm::end(); ?>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>


