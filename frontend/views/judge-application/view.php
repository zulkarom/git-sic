<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'Judge Page';
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
               <strong><b>Project /Idea Description: </b></strong> <?= nl2br(Html::encode($model->application->project_description))?>
            </div>
        </div> 
        <?php if($model->judge_at): ?>
           <br />
            <div class="card">
        <div class="card-body">

            <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Judge File: </b></strong> <?= Html::a($model->judge_file, ['judge-file', 'id' => $model->id], [
                           'target' => '_blank'])?>
                </div>     
            </div> 
            <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Judge Note: </b></strong> <?= nl2br(Html::encode($model->judge_note))?>
                </div>     
            </div> 
            
            <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-info'])?>
        
</div></div>
        <?php endif; ?>
  
        
    </div>
    </div>
    </div>


</div>
