<?php

use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Information';
$this->params['breadcrumbs'][] = $this->title;

?>
 <div class="row form-group">
        <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
</div>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($website, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 30],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap",
            "searchreplace visualblocks code fullscreen",
            "paste"
        ],
        'menubar' => false,
        'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link code"
    ]
])->label('Intro');?>

<div class="form-group">
        
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>