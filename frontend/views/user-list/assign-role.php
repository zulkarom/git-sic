<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Assign Role: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

</div>
<div class="users-update">



<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">   
            <?= $form->field($model, 'is_admin')->dropDownList(
                Common::answer(), ['prompt' => 'Please Select' ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">   
            <?= $form->field($model, 'is_reviewer')->dropDownList(
                Common::answer(), ['prompt' => 'Please Select' ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">   
            <?= $form->field($model, 'is_judge')->dropDownList(
                Common::answer(), ['prompt' => 'Please Select' ]
            ) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-submit"></i> Assign Role', ['class' => 'btn btn-info', 'name' => 'btn-submit']) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
