<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\SwissAsset;
use common\widgets\Alert;

AppAsset::register($this);
SwissAsset::register($this);

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= $dirAssests?>/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCsrfMetaTags() ?>

    <?php $this->head() ?>
</head>
<body id="top">
<?php $this->beginBody() ?>

<div class="wrapper bgded" style="background-image:url('<?= $dirAssests?>/images/banner.png');">
<div id="pageintro" class="hoc clear"> 
    <article>
 
      <h3 class="heading">SWISS INNOVATION CHALLENGE 2021</h3>
      <p>Competition for creativity, innovation, and new ventures</p>
      <footer><?= Html::a('Join us now ! <i class="fas fa-angle-right"></i>', ['/user-form/register'], ['class' => 'btn btn-danger btn-lg']) ?></footer>
    </article>

  </div>
</div>

<div class="wrapper row3">
  <section class="hoc clear"> 

<div class="group btmspace-50 demo">
      <div class="one_half first"><img src="<?= $dirAssests?>/images/logo1.png" /></div>
        <div class="one_half"><img src="<?= $dirAssests?>/images/logo2.png" /></div>

      </div>

  




  </section>
</div>




<div class="wrapper row3">
  <main class="hoc container clear"> 

    <div class="group center btmspace-80">
      <article class="one_half first">
        <h6 class="heading">What is the Swiss Innovation Challenge?</h6>
        <p style="text-align:justify">The Swiss Innovation Challenge is an innovation promotion program with competition, in which 25 finalists and one winner (“Award Winner”) are selected from over 100 innovation projects in three elimination rounds (“pitches”). The participants in the competition are SMEs and start-ups from all over Switzerland. In addition to the award, participants can receive special prizes in the areas of “Life Sciences” and “Construction”win. The competition lasts eight months. During this time, participants can take part in free, user-oriented seminars. In addition, the participants have access to mentoring and coaching programs in which they are supported and encouraged with practical knowledge. In addition to these advantages, the participants and their innovation projects benefit from network events and various publicity measures.</p>
      </article>
      <article class="one_half">

        <img src="<?= $dirAssests?>/images/join.png" /><br />
        Due date to submit application: <br />
       <b>29 August 2021 </b>
      </article>

    </div>


    <div class="clear"></div>
  </main>
</div>

<div class="wrapper row2">
  <main class="hoc container clear"> 

    <div class="group center btmspace-80">
    
    <article class="one_half first">

        <img src="<?= $dirAssests?>/images/learn.png" />
      </article>
      
      
      <article class="one_half">
        <h6 class="heading">For more information and inquiries</h6>
        <p style="text-align:center">Contact Dr. Norzalizah Binti Bahari
        <br />+6017-607 8767 <br /> norzalizah.b@umk.edu.my
</p>
      </article>
      

    </div>


    <div class="clear"></div>
  </main>
</div>

<?=$this->render('footer', [    
        'dirAssests' => $dirAssests,
]);
?>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
