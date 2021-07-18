<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-6" align="right">
    <?= Html::a('<i class="fas fa-plus"></i>  New Application ',['/user-list/create'],['data-method' => 'post', 'class' => 'btn btn-success btn-sm']) ?>
</div>
</div>

<div class="application-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [

                'label' => 'Title',
                'value' => function($model){
                    return $model->project_name;
                }
            ],
            [

                'label' => 'Leader',
                'value' => function($model){
                    return $model->applicant_name;
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],


            ['class' => 'yii\grid\ActionColumn',
                        'header'=>"ACTION",
                        'headerOptions' => ['style' => 'width:15%'],
                        'template' => '{view} {manage}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            },
                            'manage'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-eye"></span> MANAGE',['manage', 'id' => $model->id],['class'=>'btn btn-info btn-sm']);
                            }
                        ],
            
                    ],
        ],
    ]); ?>


</div>
