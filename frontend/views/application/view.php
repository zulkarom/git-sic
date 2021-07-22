<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'View Application';
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
      

            
            <div class="col-4">
                 <strong><b>Nationality: </b></strong> <?=$model->country->country_enName?>
                 
                   
                </div>
                
               
         
            </div>
            
            
             <div class="row">
            

                <div class="col-<?php echo $col1?>">
                    <strong><b>Identity document/Passport No. </b></strong>  <?=$model->id_number?><br/>
                </div>

            
            <div class="col-4">
                 <strong><b>Age: </b></strong> <?=$model->age?>
                 
                   
                </div>
                
                <div class="col-<?php echo $col1?>">
                    <strong><b>Gender: </b></strong>  <?=$model->genderText?><br/>
                </div>
         
            </div>
            
            

            <div class="row">
                <div class="col-<?php echo $col1?>">
                    <strong><b>Mobile Phone: </b></strong> <?=$model->phoneNo?>
                </div>
                
                <div class="col-<?php echo $col1?>">
                   <strong><b>Office No: </b></strong> <?=$model->officeNo?>
                </div>
                
                <div class="col-<?php echo $col1?>">
                    <strong><b>Fax No: </b></strong> <?=$model->faxNo?>
                </div>
         
            </div>
   
            <div class="row">
                <div class="col-<?php echo $col1?>">
                   <strong><b>Email: </b></strong> <?= $model->email?>
                </div>
        

                <div class="col-<?php echo $col1?>">
                   <strong><b>Institution/Business Name: </b></strong> <?=$model->instiBusName?>
                </div>
       
    
                <div class="col-<?php echo $col1?>">
                   <strong><b>Type of Business: </b></strong> <?=$model->type?>
                </div>
           
            </div>      
            <div class="row">
                <div class="col-6">
                   <strong><b>Address: </b></strong> <?=$model->address?>
                </div>
              
            </div>  

            <div class="row">
                <div class="col-<?php echo $col1?>">
                   <strong><b>Status: </b></strong> <?=$model->statusLabel?>
                </div>
             
            </div>
            <br/>


    
    
    
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><center>Project Leader / Team Member</center></th>
              <th><center>Iden.Doc./Passport No.</center></th>
              <th><center>Institution/Business Name</center></th>
              <th><center>Mobile No.</center></th>
              <th><vcenter>Email</center></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><center><?= $item->name?></center></td>
                <td><center><?= $item->idNumber?></center></td>
                <td><center><?= $item->instiBusName?></center></td>
                <td><center><?= $item->phoneNo?></center></td>
                <td><center><?= $item->email?></center></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>
    
     <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Project / Idea Name: </b></strong> <?= $model->project_name?>
                </div>
        

     
           
            </div> 
            

            
            <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Project /Idea Descriptione: </b></strong> <?= nl2br(Html::encode($model->project_description))?>
                </div>
        

     
           
            </div> 

            <?php if($model->payment_file): ?>
                <div class="row form-group">
                    <div class="col-10" style="text-align: justify">
                       <strong><b>Payment File: </b></strong> <?= Html::a($model->payment_file, ['payment-file', 'id' => $model->id], [
                               'target' => '_blank'])?>
                    </div>     
                </div> 
                <div class="row form-group">
                    <div class="col-10" style="text-align: justify">
                       <strong><b>Payment Note: </b></strong> <?= nl2br(Html::encode($model->payment_note))?>
                    </div>     
                </div> 
            <?php endif; ?>

    
    

            
            
            
    </div>
    </div>
    <br/>
    
    
    
    <p>
    
    <?php if($model->status == 0) {?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     
                
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this application?',
                        'method' => 'post',
                    ],
                ]) ?>
                
                
       <?php } else if ($model->status == 10 && $model->category == 1){
           echo Html::a('Make Payment', ['payment', 'id' => $model->id], ['class' => 'btn btn-primary']);
       }
       
       
       
       ?>         
            </p>
    
    
    
    
    
    

</div>
