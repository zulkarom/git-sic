<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories mixed*/

$this->title = 'Important Dates';
$this->params['breadcrumbs'][] = $this->title;


?>
 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
<?php $form = ActiveForm::begin(); ?>

<div class="row">


    

    <?php 
    foreach($categories as $x => $category){ 
        $order = $category->sorting();
        $label = $category->attributeLabels();
        
        ?>
        
        <div class="col-md-4">

   <div class="card">
    <div class="card-body">
    <h4 class="card-title"><?=$category->cat_name ?></h4>
      <br />
      
      <?php 
      
      foreach($order as $k => $o){
          echo $form->field($category, "[{$x}]" . $o)->textarea(['rows' => 2]);
      }
      
      ?>




  </div>
    </div>

    </div>
        
        
        
   <?php 
    }
    ?>
    
</div>



<br />
<div class="form-group">
        
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
    
    
    
