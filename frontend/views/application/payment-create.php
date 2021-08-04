<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Website;

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
    
    
<?=Website::findOne(2)->content?>
    
    
   <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?> 
 <div class="card">
        <div class="card-body">
        <div class="row form-group">
            <div class="col-10" style="text-align: justify">
               <strong><b>Project / Idea Name: </b></strong> <?= $model->project_name?>
            </div>
        </div>
        
         <div class="row form-group">
            <div class="col-10" style="text-align: justify">
               <strong><b>Category: </b></strong> <?= $model->categoryText?>
            </div>
        </div> 
        
        
        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'payment_file')->fileInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'payment_note')->textarea(['rows' => 4])?>
            </div>
        </div>

        <div class="form-group">
        <?= Html::submitButton('Submit Payment', ['class' => 'btn btn-primary', 'name' => 'btn-submit']) ?>
        </div>
            
            
    </div>
    </div>

     <?php ActiveForm::end(); ?>   
   