<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>

<div class="user-index">
<div class="table-responsive">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            //'authKey',
            // 'accessToken',
            [
                'attribute' =>'fullname',
                'label' => 'Name',
                'value' => function($model){
                    return strtoupper($model->fullname);
                }
            ],
            [
                'attribute' =>'username',
                'label' => 'Email'
            ]
            ,
            'institution',
            [
                'attribute' =>'status',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'status', [10 => 'ACTIVE', 9 => 'INACTIVE'],['class'=> 'form-control','prompt' => 'Choose']),
                'label' => 'Status',
                'value' => function($model){
                return $model->statusLabel;
                }
            ],
                
            [
                'attribute' =>'is_admin',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'is_admin', [1 => 'YES', 0 => 'NO'],['class'=> 'form-control','prompt' => 'Choose']),
                'label' => 'Admin',
                'value' => function($model){
                          return $model->adminLabel;
                    }
            ],
            
            [
                'attribute' =>'is_judge',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'is_judge', [1 => 'YES', 0 => 'NO'],['class'=> 'form-control','prompt' => 'Choose']),
                'label' => 'Judge',
                'value' => function($model){
                return $model->judgeLabel;
                }
                ],
            
            [
                'attribute' =>'is_reviewer',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'is_reviewer', [1 => 'YES', 0 => 'NO'],['class'=> 'form-control','prompt' => 'Choose']),
                'label' => 'Reviewer',
                'value' => function($model){
                return $model->reviewerLabel;
                }
            ],
            
            
                
 

            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 16%'],
                'template' => '{update} {assign}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span> UPDATE',['user-list/update/', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                    },
                    'assign'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil"></span> ASSIGN ROLE',['user-list/assign-role/', 'id' => $model->id],['class'=>'btn btn-info btn-sm']);
                    }
                ],
            
            ],

        ],
    ]); ?></div>

</div>
