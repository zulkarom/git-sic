<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'Review Page';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$col1 = 4;
?>
 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
<div class="application-view">

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-<?php echo $col1?>">
                    <div class="float-left">
                    <strong><b>Category: </b></strong> <?=$model->application->categoryText?>
                   </div>
               </div>
      
            </div>
            <div class="row">
            

                <div class="col-<?php echo $col1?>">
                    <div class="float-left">
                    <strong><b>Applicant Name : </b></strong> <?=$model->application->applicant_name?>
                   </div>
               </div>
         
            </div>
            <br/>


   
    
        <div class="row form-group">
            <div class="col-10" style="text-align: justify">
               <strong><b>Project / Idea Name: </b></strong> <?= $model->application->project_name?>
            </div>
        </div> 

        <div class="row form-group">
            <div class="col-10" style="text-align: justify">
               <strong><b>Project /Idea Descriptione: </b></strong> <?= nl2br(Html::encode($model->application->project_description))?>
            </div>
        </div> 
        
        
        </div></div>
        <br />
            <div class="card">
        <div class="card-body">
        

            <?php $form = ActiveForm::begin(); ?> 
            <div class="row">
                <div class="col-12">
                    <?= $form->field($model, 'review_note')->textArea(['rows' => '6'])->label('<strong><b>Review Note</b></strong>') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <?= $form->field($model, 'review_file')->fileInput()->label('<strong><b>Review File</b></strong>') ?>
                </div>
            </div>

            <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save"></i> Submit', ['class' => 'btn btn-info', 'name' => 'btn-submit']) ?>
            </div>

            <?php ActiveForm::end(); ?> 

  
        
    </div>
    </div>
    </div>



