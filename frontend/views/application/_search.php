<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ApplicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'applicant_name') ?>

    <?= $form->field($model, 'nationality') ?>

    <?= $form->field($model, 'ic_number') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'phoneNo') ?>

    <?php // echo $form->field($model, 'officeNo') ?>

    <?php // echo $form->field($model, 'faxNo') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'instiBusName') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'logo_file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
