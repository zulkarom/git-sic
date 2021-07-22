<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'Submit Payment Information';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$col1 = 4;

?>
<div class="application-view">

<div class="row form-group">
      <div class="col-md-8"><h3><?= Html::encode($this->title) ?></h3></div>


    </div>
   <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?> 
 <div class="card">
        <div class="card-body">
<div class="row">
        <div class="col-8">
            <?= $form->field($model, 'payment_note')->textarea(['rows' => 4])?>
        </div>
    </div>
            
            
    </div>
    </div>

     <?php ActiveForm::end(); ?>   
   