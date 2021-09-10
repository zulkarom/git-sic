<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
      
      <div class="col-md-4" align="right"><a href="<?=Url::to(['application/create'])?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>  Add Application</a></div>


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
                    <strong><b>Applicant Name : </b></strong> <?=Html::encode($model->applicant_name)?>
                   </div>
               </div>
      

            
            <div class="col-4">
                 <strong><b>Nationality: </b></strong> <?=$model->country->country_enName?>
                 
                   
                </div>
                
               
         
            </div>
            
            
             <div class="row">
            

                <div class="col-<?php echo $col1?>">
                    <strong><b>Identity document/Passport No. </b></strong>  <?=Html::encode($model->id_number)?><br/>
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
                    <strong><b>Mobile Phone: </b></strong> <?=Html::encode($model->phoneNo)?>
                </div>
                
                <div class="col-<?php echo $col1?>">
                   <strong><b>Office No: </b></strong> <?=Html::encode($model->officeNo)?>
                </div>
                
                <div class="col-<?php echo $col1?>">
                    <strong><b>Fax No: </b></strong> <?=Html::encode($model->faxNo)?>
                </div>
         
            </div>
   
            <div class="row">
                <div class="col-<?php echo $col1?>">
                   <strong><b>Email: </b></strong> <?= $model->email?>
                </div>
        

                <div class="col-<?php echo $col1?>">
                   <strong><b>Institution/Business Name: </b></strong> <?=Html::encode($model->instiBusName)?>
                </div>
       
    
                <div class="col-<?php echo $col1?>">
                   <strong><b>Type of Business: </b></strong> <?=Html::encode($model->type)?>
                </div>
           
            </div>      
            <div class="row">
                <div class="col-6">
                   <strong><b>Address: </b></strong> <?=Html::encode($model->address)?>
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
                <td><center><?= Html::encode($item->name)?></center></td>
                <td><center><?= Html::encode($item->idNumber)?></center></td>
                <td><center><?= Html::encode($item->instiBusName)?></center></td>
                <td><center><?= Html::encode($item->phoneNo)?></center></td>
                <td><center><?= $item->email?></center></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>
    
     <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Project / Idea Name: </b></strong> <?= Html::encode($model->project_name)?>
                </div>
        

     
           
            </div> 
            

            
            <div class="row form-group">
                <div class="col-10" style="text-align: justify">
                   <strong><b>Project /Idea Descriptione: </b></strong> <?= nl2br(Html::encode($model->project_description))?>
                </div>
        

     
           
            </div> 



    
    

            
            
            
    </div>
    </div>
    <br/>
    
    
    
    <p>
    
    <?php if($model->status == 0) {?>
               
     
                
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this application?',
                        'method' => 'post',
                    ],
                ]) ?>
                
                
       <?php } else if (is_null($model->payment_at)){
           echo Html::a('Make Payment', ['payment-create', 'id' => $model->id], ['class' => 'btn btn-primary']);
       }
       
       
       
       ?>    
       
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>     
            </p>
    
    
    
    
    
    

</div>
