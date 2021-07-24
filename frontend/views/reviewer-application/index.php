<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgeApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Review Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
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
                    return $model->application->project_name;
                }
            ],
            [

                'label' => 'Leader',
                'value' => function($model){
                    return $model->application->applicant_name;
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'value' => function($model){
                    return $model->application->statusLabel;
                }
            ],


            ['class' => 'yii\grid\ActionColumn',
                        'header'=>"ACTION",
                        'headerOptions' => ['style' => 'width:15%'],
                        'template' => '{view}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            }
                        ],
            
                    ],
        ],
    ]); ?>


</div>
