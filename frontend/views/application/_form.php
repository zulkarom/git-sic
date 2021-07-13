<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Common;
use kartik\checkbox\CheckboxX;
use backend\models\Countries;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'category')->checkboxList(['1'=>'SICOpen', '2'=>'SICStartup', '3'=>'SICYouth']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'applicant_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nationality')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Countries::find()->all(),'country_code', 'country_enName'),
                    'options' => ['placeholder' => 'Select...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'ic_number')->textInput()->label('Identity/Passport No. ') ?>
        </div>
        <div class="col-md-4">   
            <?= $form->field($model, 'gender')->dropDownList(
                Common::gender(), ['prompt' => 'Please Select' ]
            ) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'phoneNo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">   
            <?= $form->field($model, 'officeNo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'faxNo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'instiBusName')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $form->field($model, 'address')->textArea(['rows' => '2']) ?>
        </div>
    </div>

    

    

    

    

    

    <?= $form->field($model, 'logo_file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save Application', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
