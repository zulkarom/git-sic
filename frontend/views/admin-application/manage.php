<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;
use frontend\models\ApplicationStatus;
use yii\helpers\ArrayHelper;
use common\models\User;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = $model->applicant_name;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
</div>
<h4><?=$model->categoryText?></h4><br/>

<?php $form = ActiveForm::begin(); ?>
<div class="application-view">
<div class="row">
    <div class="col-md-6"> 
        <?= $form->field($model, 'status')->dropDownList(
            ArrayHelper::map(ApplicationStatus::find()->all(),'status', 'name'), ['prompt' => 'Select Status' ]
        )->label('Status') ?>
    </div>
</div>
<div class="row">
   <div class="col-md-6">
        <?= $form->field($reviewer, 'reviewer_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(User::find()->where(['is_reviewer' => 1])->all(),'id', 'fullname'),
            'options' => ['placeholder' => 'Please Select'],
            'class' => 'form-control',
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);?>
    </div>
</div>
<div class="row">
   <div class="col-md-6">
        <?= $form->field($judge, 'judge_id')->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(User::find()->where(['is_judge' => 1])->all(),'id', 'fullname'),
            'options' => ['placeholder' => 'Please Select'],
            'class' => 'form-control',
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);?>
    </div>
</div>
</div>

<?php ActiveForm::end(); ?>
