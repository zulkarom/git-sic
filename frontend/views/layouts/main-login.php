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
    <link href="<?= $dirAssests?>/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />

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
    
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <?=$this->render('footer', [    
        'dirAssests' => $dirAssests,
]);
?>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
