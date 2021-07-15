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
    <title>SWISS INNOVATION CHALLENGE 2021</title>
    <?php $this->registerCsrfMetaTags() ?>

    <?php $this->head() ?>
    
    
</head>
<body id="top">
<?php $this->beginBody() ?>


<header class="header1" style="height:80px">
		<!-- Header desktop -->
		<div class="container-menu-header">


			<div class="wrap_header">
			
			

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						<li>
                            <a href="#">
                                Home</a>
                        </li><li>
                            <a href="#type-competition">
                                Competition Type</a>
                        </li><li>
                            <a href="#">
                                Awards</a>
                        </li><li>
                            <a href="#">
                                Login</a>
                        </li><li>
                            <a href="#">
                                Contact Us</a>
                        </li>							
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					
										
					

				
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<a href="index.html" class="logo-mobile">
				
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				
				
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
				<ul class="main-menu">
				
				<li class="item-menu-mobile">
                            <a href="#">
                                HOME</a>
                        </li><li class="item-menu-mobile">
                            <a href="#">
                                COMPETITION TYPE</a>
                        </li><li class="item-menu-mobile">
                            <a href="#">
                                AWARDS</a>
                        </li><li class="item-menu-mobile">
                            <a href="#">
                                LOGIN</a>
                        </li><li class="item-menu-mobile">
                            <a href="#">
                                CONTACT US</a>
                        </li>
					
				</ul>
			</nav>
		</div>
	</header>

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
      
      
      
      
        <h6 class="heading">For more information and inquiries</h6>
        
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
</body>
</html>
<?php $this->endPage() ?>
