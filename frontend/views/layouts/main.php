<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\SwissAsset;

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
    <title>SWISS INNOVATION CHALLENGE 2021</title>
    <?php $this->registerCsrfMetaTags() ?>

    <?php $this->head() ?>
    
    
</head>
<body id="top">
<?php $this->beginBody() ?>

<?=$this->render('menu-top-public');
?>

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




<div class="wrapper web-display  row3">
  <main class="hoc container clear"> 

    <div class="group center btmspace-80">
      <article class="one_half first">
        <h6 class="heading" style="font-size:30px">What is the Swiss Innovation Challenge?</h6>
        <p style="text-align:justify;font-size:16px">Swiss Innovation Challenge (SIC) is the first innovation promotion programme in Switzerland with an integrated competition that takes a holistic approach to realising innovative business ideas along the lifecycle of the enterprise. SIC is an annual prestigious program led by the University of Applied Sciences and Arts Northwestern Switzerland (FHNW) with the full support from the Swiss Government. To date, SIC has already developed worldwide including Indonesia, Vietnam, Thailand, China and Malaysia. This year, DRB-HICOM University of Automotive Malaysia (DRB-HICOM U) has the honour to host the Swiss Innovation Challenge (SIC 2020) which will commence from Jun 2021 til November 2021. DRB-HICOM U collaborates with FHNW, Swiss Malaysia Business Association (SMBA), National Knowledge Transfer Programme and other institutions and industries. This program aims to help entrepreneurs and potential entrepreneurs in innovation-based business and commercial development.
</p>
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

<?=$this->render('categories', [    
    'dirAssests' => $dirAssests,
]);
?>

<div class="wrapper row3">
  <main class="hoc container clear"> 

    <div class="group center btmspace-80">
    
    <article class="one_half first">

        <img src="<?= $dirAssests?>/images/learn.png" />
      </article>
      
      
      <article class="one_half">
      
      
      
      
        <h6 class="heading" id="contact-us">For more information and inquiries</h6>
        
        <h6 class="heading">Contact </h6>
        
        
        <p style="text-align:center">Dr. Norzalizah Binti Bahari
        <br />+6017-607 8767 <br /> norzalizah.b@umk.edu.my
</p>

<p style="text-align:center">Dr. Zaminor Binti Zamzamir @ Zamzamin
        <br />+6017-607 8767 <br /> zaminor@umk.edu.my
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

<script>

$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


</script>
</body>
</html>
<?php $this->endPage() ?>
