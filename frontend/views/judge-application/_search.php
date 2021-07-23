<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgeApplicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'applicant_name') ?>

    <?= $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'id_number') ?>

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

    <?php // echo $form->field($model, 'project_name') ?>

    <?php // echo $form->field($model, 'project_description') ?>

    <?php // echo $form->field($model, 'medium_web') ?>

    <?php // echo $form->field($model, 'medium_email') ?>

    <?php // echo $form->field($model, 'medium_others') ?>

    <?php // echo $form->field($model, 'reference') ?>

    <?php // echo $form->field($model, 'aggrement_disclaimer') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'payment_note') ?>

    <?php // echo $form->field($model, 'payment_file') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'payment_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
