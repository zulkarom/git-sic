<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Application */

$this->title = 'New Application';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">
    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
