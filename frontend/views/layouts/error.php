<?php
use common\widgets\Alert;
use yii\helpers\Html;
use frontend\assets\SwissAsset;
use frontend\assets\AppAsset;
use kartik\widgets\ActiveForm;

SwissAsset::register($this);
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    
    <?php $this->head() ?>
</head>
<body id="top">

<?php $this->beginBody() ?>

<?=$this->render('menu_top', [    
    'dirAssests' => $dirAssests,
]);
?>

<div class="wrapper bgded" style="background-image:url('<?= $dirAssests?>/images/banner.png');">

  <div id="pageintro" class="hoc clear" style="padding:20px"> 
    <article>
 
      <h3 class="heading">SWISS INNOVATION CHALLENGE 2021</h3>
    </article>

  </div>

</div>


    
    <?= Alert::widget() ?>
    <?= $content ?>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
