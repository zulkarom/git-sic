<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'Application';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
</div>
<div class="application-view">

    <div class="card">
        <div class="card-header"><b>Applicant Name : <?=$model->applicant_name?></b></div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <div class="float-left">
                    <strong><b>Category: </b></strong>
                   </div>
               </div>
               <div class="col-6">
                    <div class="float-left">
                    <b><?=$model->categoryText?></b>
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong><b>Gender: </b></strong><br/>
                </div>
                 <div class="col-6">
                    <b><?=$model->genderText?></b>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong><b>Age: </b></strong><br/>
                </div>
                 <div class="col-6">
                    <b><?=$model->age?></b>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong><b>Mobile Phone: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->phoneNo?></b><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                   <strong><b>Office No: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->officeNo?></b><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <strong><b>Fax No: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->faxNo?></b><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                   <strong><b>Email: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?= $model->email?></b><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                   <strong><b>Institution/Business Name: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->instiBusName?></b><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                   <strong><b>Type of Business: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->type?></b><br/>
                </div>
            </div>      
            <div class="row">
                <div class="col-6">
                   <strong><b>Address: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->address?></b><br/>
                </div>
            </div>  
            <div class="row">
                <div class="col-6">
                   <strong><b>Logo File: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=Html::a(' Download <span class="glyphicon glyphicon-download-alt"></span>', ['logo-image', 'id' => $model->id], [
                                   'target' => '_blank']);?></b><br/>
                </div>
            </div> 
            <div class="row">
                <div class="col-6">
                   <strong><b>Status: </b></strong>
                </div>
                 <div class="col-6">
                    <b><?=$model->statusLabel?></b><br/>
                </div>
            </div>
            <br/>
            <p>
                <?= Html::a('Manage', ['manage', 'id' => $model->id], ['class' => 'btn btn-info btn-sm']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this client?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>
    <br/>
    <div class="card">
    <div class="card-header"><b>Team Members Information</b></div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><center>Name And Designation<br/> (PROJECT LEADER / TEAM MEMBER)</center></th>
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
    </div>
    </div>
    <br/>

    <div class="row">
    <div class="col-6">
        <div class="card">
        <div class="card-header"><b>Reviewer</b></div>
        <div class="card-body">
            <?php foreach ($model->applicationReviewer as $reviewer) : ?>
            <div class="row">
                <div class="col-6">
                   <strong><?=$reviewer->user->fullname?></b></strong>
                </div>
            </div>    
            <?php endforeach; ?>
        </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
        <div class="card-header"><b>Judge</b></div>
        <div class="card-body">
            <?php foreach ($model->applicationJudge as $judge) : ?>
            <div class="row">
                <div class="col-6">
                   <strong><?=$judge->user->fullname?></b></strong>
                </div>
            </div>    
            <?php endforeach; ?>
        </div>
        </div>
    </div>
    </div>

</div>
