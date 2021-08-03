<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Important Dates';
$this->params['breadcrumbs'][] = $this->title;

?>
 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
<div class="col-md-12">


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Events</th>
      <th scope="col">Dates</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($dates as $x => $date){
      echo Html::activeHiddenInput($date, "[{$x}]id");
      ?>

    <tr>
      <th scope="row"><?php echo ($x + 1)?>. </th>
      <td><?= $form->field($date, "[{$x}]title")->label(false) ?></td>
      <td><?= $form->field($date, "[{$x}]date")->label(false) ?></td>
      <td>
      
      <?= $form->field($date, "[{$x}]description")->widget(TinyMce::className(), [
    'options' => ['rows' => 4],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap",
            "searchreplace visualblocks code fullscreen",
            "paste"
        ],
        'menubar' => false,
        'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link"
    ]
])->label(false);?>
      
      </td>

    </tr>
        <?php 
    }

?>
      


  </tbody>
</table>






<div class="form-group">
        
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
    
    
    
    </div>
</div>
    