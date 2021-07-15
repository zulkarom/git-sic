<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Category',
                'value' => function($model){
                    return $model->categoryText;
                }
            ],
            'applicant_name',
            [
                'label' => 'Nationality',
                'value' => function($model){
                    return $model->country->country_enName;
                }
            ],
            'id_number',
            [
                'label' => 'Gender',
                'value' => function($model){
                    return $model->genderText;
                }
            ],
            'age',
            'phoneNo',
            'officeNo',
            'faxNo',
            'email:email',
            'instiBusName',
            'type',
            'address',
            [
                'format' => 'raw',
                'label' => 'Logo Image',
                'value' => function($model){
                    if($model->logo_file){
                        return Html::a(' Download <span class="glyphicon glyphicon-download-alt"></span>', ['logo-image', 'id' => $model->id], [
                                   'target' => '_blank']);
                    }
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],
        ],
    ]) ?>
    <br/>
    <p><b>TEAM MEMBERS INFORMATION</b></p>
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Name And Designation<br/>(PROJECT LEADER / TEAM MEMBER)</th>
              <th>Iden.Doc./Passport No.</th>
              <th>Institution/Business Name</th>
              <th>Mobile No.</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item->name?></td>
                <td><?= $item->idNumber?></td>
                <td><?= $item->instiBusName?></td>
                <td><?= $item->phoneNo?></td>
                <td><?= $item->email?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

</div>
