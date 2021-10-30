<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Common;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\ApplicationStatus;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Draft Applications';
$this->params['breadcrumbs'][] = $this->title;
?>

 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        
        <div class="col-md-6" align="right">


</div>
        
        
        
        
</div>

<div class="application-index">
<div class="table-responsive">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [

                'label' => 'Title',
                'attribute' => 'project_name',
                'value' => function($model){
                    return $model->project_name;
                }
            ],
            [

                'label' => 'Applicant',
                'attribute' => 'applicant_name',
                'value' => function($model){
                    return $model->applicant_name;
                }
            ],
            [
                
                'label' => 'Category',
                'attribute' => 'category',
                'value' => function($model){
                return $model->categoryText;
                }
            ],
            [
                'format' => 'date',
                'label' => 'Last Update',
                'attribute' => 'updated_at',
                
                'value' => function($model){
                    return $model->updated_at;
                }
            ],


            ['class' => 'yii\grid\ActionColumn',
                      //  'header'=>"ACTION",
                        'headerOptions' => ['style' => 'width:15%'],
                        'template' => '{view}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-search"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            },

                        ],
            
                    ],
        ],
    ]); ?></div>


</div>
