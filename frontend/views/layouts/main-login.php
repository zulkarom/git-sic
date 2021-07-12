<?php
use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\SwissAsset;
use backend\assets\AppAsset;
use kartik\widgets\ActiveForm;

SwissAsset::register($this);
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/swissAsset');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body id="top">

<?php $this->beginBody() ?>

<div class="wrapper bgded" style="background-image:url('<?= $dirAssests?>/images/banner.png');">

  <div id="pageintro" class="hoc clear" style="padding:20px"> 
    <article>
 
      <h3 class="heading">SWISS INNOVATION CHALLENGE 2021</h3>
    </article>

  </div>

</div>

<div class="wrapper row3">
  <section class="hoc clear"> 

<div class="group">
      <div class="one_half first"><img src="<?= $dirAssests?>/images/logo1.png" /></div>
        <div class="one_half"><img src="<?= $dirAssests?>/images/logo2.png" /></div>

      </div>

  </section>
</div>
    
    <?= Alert::widget() ?>
    <?= $content ?>
    <?=$this->render('footer');?>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
