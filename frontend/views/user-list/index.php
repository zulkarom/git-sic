<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-6" align="right">
    <?= Html::a('<i class="fas fa-plus"></i>  New Userss ',['/user-list/create'],['data-method' => 'post', 'class' => 'btn btn-success btn-sm']) ?>
</div>
</div>

<div class="user-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' =>'username',
                'label' => 'Username'
            ]
            ,
            //'authKey',
            // 'accessToken',
            [
                'attribute' =>'fullname',
                'label' => 'Name',
                'value' => function($model){
                    return strtoupper($model->fullname);
                }
            ],
            'institution',
 

            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 20%'],
                'template' => '{update} {assign}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> UPDATE',['user-list/update/', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                    },
                    'assign'=>function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> ASSIGN ROLE',['user-list/assign-role/', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                    }
                ],
            
            ],

        ],
    ]); ?>

</div>
