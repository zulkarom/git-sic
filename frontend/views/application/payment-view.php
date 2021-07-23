<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'View Payment';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$col1 = 4;

?>
<div class="application-view">

<div class="row form-group">
      <div class="col-md-8"><h3><?= Html::encode($this->title) ?></h3></div>


    </div>
    
 <div class="card">
        <div class="card-body">
        
        <div class="row form-group">
            <div class="col-10" style="text-align: justify">
               <strong><b>Project / Idea Name: </b></strong> <?= $model->project_name?>
            </div>
        </div> 

            <div class="row">
                <div class="col-<?php echo $col1?>">
                    <div class="float-left">
                    <strong><b>Category: </b></strong> <?=$model->categoryText?>
                   </div>
               </div>
      
            </div>
            <div class="row">
            

                <div class="col-<?php echo $col1?>">
                    <div class="float-left">
                    <strong><b>Applicant Name : </b></strong> <?=$model->applicant_name?>
                   </div>
               </div>         
            </div>

            <?php if($model->payment_file): ?>
                <div class="row">
                    <div class="col-10" style="text-align: justify">
                       <strong><b>Payment File: </b></strong> <?= Html::a(basename($model->payment_file), ['payment-file', 'id' => $model->id], [
                               'target' => '_blank'])?>
                    </div>     
                </div> 
                <div class="row">
                    <div class="col-10" style="text-align: justify">
                       <strong><b>Payment Note: </b></strong> <?= nl2br(Html::encode($model->payment_note))?>
                    </div>     
                </div> 
            <?php endif; ?>

    
    

            
            
            
    </div>
    </div>
    <br/>
    
    
    
    
    
    
    
    
    

</div>
