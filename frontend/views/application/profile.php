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
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    
     <?= $form->field($model, 'rawPassword')->passwordInput(['maxlength' => true])->label('Reset Password (leave blank if no change)') ?>
     

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        

    </div>

    <?php ActiveForm::end(); ?>

</div>

</div></div>
</div>
