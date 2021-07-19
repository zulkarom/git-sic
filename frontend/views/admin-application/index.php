<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
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
                    'format' => 'html',
                    'label' => 'Status',
                    'value' => function($model){
                        return $model->statusLabel;
                    }
                ],
            ];
?>



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
