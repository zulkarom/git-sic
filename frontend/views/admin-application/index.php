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

$this->title = 'All Applications';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
                ['class' => 'yii\grid\SerialColumn'],
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
                    'label' => 'Status',
                    'value' => function($model){
                    return $model->statusText;
                    }
                ],
            ];
?>






 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
        
        <div class="col-md-6" align="right">

    <?=ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'filename' => 'APPLICATION_' . date('Y-m-d'),
        'onRenderSheet'=>function($sheet, $grid){
            $sheet->getStyle('A2:'.$sheet->getHighestColumn().$sheet->getHighestRow())
            ->getAlignment()->setWrapText(true);
        },
        'exportConfig' => [
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_EXCEL_X => false,
        ],
    ]);?>   

</div>
        
        
        
        
</div>

<div class="application-index">
<div class="table-responsive">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
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
                'filter' => Html::activeDropDownList($searchModel, 'category', Common::category(),['class'=> 'form-control','prompt' => 'Choose']),
                'value' => function($model){
                return $model->categoryText;
                }
            ],
            [
                'format' => 'html',
                'label' => 'Status',
                'filter' => Html::activeDropDownList($searchModel, 'status', ArrayHelper::map(ApplicationStatus::find()->where(['>', 'status', 0])->all(), 'status', 'name'),['class'=> 'form-control','prompt' => 'Choose']),
                'attribute' => 'status',
                
                'value' => function($model){
                    return $model->statusLabel;
                }
            ],


            ['class' => 'yii\grid\ActionColumn',
                      //  'header'=>"ACTION",
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
    ]); ?></div>


</div>
