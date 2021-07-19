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
    <div class="col-md-12"> 
        <?= $form->field($model, 'status')->dropDownList(
            ArrayHelper::map(ApplicationStatus::find()->all(),'status', 'name'), ['prompt' => 'Select Status' ]
        )->label('Status') ?>
    </div>
</div>
<div class="row">
   <div class="col-md-12">
    <label class="control-label">Reviewer</label>
    <?=Select2::widget([
        'name' => 'sel_reviewer',
        'value' => ArrayHelper::map($model->applicationReviewer, 'reviewer_id', 'reviewer_id'),
        'data' => ArrayHelper::map(User::find()->where(['is_reviewer' => 1])->all(),'id', 'fullname'),
        'pluginOptions'  => ['multiple' => true, 'allowClear' => true, 'placeholder' => 'Select reviewer ...']
    ]);?>
    </div>
</div>

<div class="row">
   <div class="col-md-12">
    <label class="control-label">Judge</label>
    <?=Select2::widget([
        'name' => 'sel_judge',
        'value' => ArrayHelper::map($model->applicationJudge, 'judge_id', 'judge_id'),
        'data' => ArrayHelper::map(User::find()->where(['is_judge' => 1])->all(),'id', 'fullname'),
        'pluginOptions'  => ['multiple' => true, 'allowClear' => true, 'placeholder' => 'Select judge ...']

    ]);?>
    </div>
</div>
<br/>

<div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-info', 'name' => 'btn-submit']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
