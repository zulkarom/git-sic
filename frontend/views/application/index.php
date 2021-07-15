<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">

    .table {
        width: 100% !important;
        margin-bottom: 1rem !important;
        color: #212529 !important;
    }
    .table th, .table td {
        padding: 0.75rem !important;
        vertical-align: top !important;
        border-top: 1px solid #dee2e6 !important;
    }
</style>
<div class="application-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                        'template' => '{view} {update}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            },
                            'update'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-edit"></span>  UPDATE',['update', 'id' => $model->id],['class'=>'btn btn-info btn-sm']);
                            },
                        ],
            
                    ],
        ],
    ]); ?>


</div>
