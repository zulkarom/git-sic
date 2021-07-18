<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>

         

               
        
      


<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:40px;"> 
  
  <h2 style="padding-bottom:40px;text-align:center">RESET PASSWORD.</h2>
  

        
        <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        
         <?php $form = ActiveForm::begin([
                    'id' => 'password-recovery-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>
             <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg']) ?>
      

           <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-danger']) ?><br>
    <?php ActiveForm::end(); ?>
        
        
        </div>
        <div>
        
        
        
        

      

    </div>


    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

 