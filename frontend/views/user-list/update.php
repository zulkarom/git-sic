<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use SebastianBergmann\CodeCoverage\Report\PHP;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Update: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="users-update">



<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($model, 'rawPassword')->passwordInput(['maxlength' => true])->label('Reset Password (leave blank if no change)') ?>
     
    <?php
    if($model->status == 10){
        $model->active = 1;
    }else{
        $model->active = 0;
    }
    echo $form->field($model, 'active')->checkbox(['value' => '1', 'label'=> 'Active']); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
         <?php 
         if(!$model->isNewRecord){
             echo Html::a('Login as',['user-list/login-as', 'user' => $model->id],['class' => 'btn btn-danger']);
         }
         
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div></div>
</div>
