<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            'applicant_name',
            'nationality',
            'ic_number',
            //'gender',
            //'age',
            //'phoneNo',
            //'officeNo',
            //'faxNo',
            //'email:email',
            //'instiBusName',
            //'type',
            //'address',
            //'logo_file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
