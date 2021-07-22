<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row form-group">
      <div class="col-md-8"><h3><?= Html::encode($this->title) ?></h3></div>



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
                    return $model->project_name;
                }
            ],
            [

                'label' => 'Leader',
                'value' => function($model){
                    return $model->applicant_name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                        'header'=>"ACTION",
                        'headerOptions' => ['style' => 'width:15%'],
                        'template' => '{view}',
                        //'visible' => false,
                        'buttons'=>[
                            'view'=>function ($url, $model) {
                            if($model->payment_at){
                                return Html::a('<span class="fa fa-search"></span> VIEW PAYMENT',['payment-view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            }else{
                                return Html::a('<span class="fa fa-search"></span> MAKE PAYMENT',['payment-create', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                            }
                               
                            },
                      
                        ],
            
                    ],
        ],
    ]); ?>


</div>
