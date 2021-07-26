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
    <style>
.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}


.pricingTable{
    font-family: 'Poppins', sans-serif;
    text-align: center;
    padding: 0 0 17px;
    position: relative;
    z-index: 1;
}
.pricingTable:before{
    content: '';
    background-color: #fff;
    height: 100%;
    width: 80%;
    margin: auto;
    box-shadow: 0 0 15px rgba(0,0,0,0.3);
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    z-index: -1;
}
.pricingTable .pricingTable-header{ padding: 20px 20px 18px; }
.pricingTable .title{
    color: rgb(21,73,97);
    font-size: 30px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: capitalize;
    margin: 0;
}
.pricingTable .pricing-content{
    color: #fff;
    background-color: rgba(21,73,97,0.9);
    padding: 40px 20px 35px;
    margin: 0 0 15px;
}
.pricingTable .pricing-content ul{
    text-align: left;
    padding: 0;
    margin: 0 0 30px;
    list-style: none;
    display: inline-block;
}
.pricingTable .pricing-content ul li{
    font-size: 16px;
    line-height: 25px;
    padding: 0 0 0 35px;
    margin: 0 0 25px;
    position: relative;
}
.pricingTable .pricing-content ul li:last-child{ margin-bottom: 0; }
.pricingTable .pricing-content ul li:before{
    color: #3E8F00;
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-size: 18px;
    font-weight: 900;
    position: absolute;
    top: 0;
    left: 0;
}
.pricingTable .pricing-content ul li.disable:before{
    color: #FF4239;
    content: "\f00d";
}
.pricingTable .price-value .amount{
    font-size: 38px;
    font-weight: 300;
    line-height: 50px;
    display: block;
}
.pricingTable .price-value .duration{
    font-size: 19px;
    font-weight: 300;
    display: block;
}
.pricingTable .pricingTable-signup a{
    color: rgb(21,73,97);
    font-size: 20px;
    font-weight: 500;
    text-transform: capitalize;
    display: inline-block;
    transition: all 0.3s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{ text-shadow: 0 0 3px rgba(0, 0, 0, 0.3); }
.pricingTable.red .title,
.pricingTable.red .pricingTable-signup a{
    color: rgb(172,26,49);
}
.pricingTable.red .pricing-content{ background-color: rgba(172,26,49,0.9); }
.pricingTable.black .title,
.pricingTable.black .pricingTable-signup a{
    color: rgb(50,50,50);
}
.pricingTable.black .pricing-content{ background-color: rgba(50, 50, 50, 0.9); }
@media only screen and (max-width: 990px){
    .pricingTable{ margin: 0 0 40px; }
}
    
    </style>
</head>
<body id="top">
<?php $this->beginBody() ?>



<?=$this->render('menu_top', [    
    'dirAssests' => $dirAssests,
]);
?>

<div class="wrapper bgded" style="background-image:url('<?= $dirAssests?>/images/banner.png');">
<div id="pageintro" class="hoc clear"> 
    <article>
 
      <h3 class="heading">SWISS INNOVATION CHALLENGE 2021</h3>
      <p>Competition for creativity, innovation, and new ventures</p>
      <footer><?= Html::a('Join us now ! <i class="fas fa-angle-right"></i>', ['/site/login'], ['class' => 'btn btn-outline-danger btn-lg']) ?></footer>
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
        <p style="text-align:justify;font-size:16px">Swiss Innovation Challenge (SIC) is an  innovation promotion programme in Switzerland with an integrated competition that takes a holistic approach to realising innovative business ideas along the lifecycle of the enterprise. SIC is an annual prestigious program led by the University of Applied Sciences and Arts Northwestern Switzerland (FHNW) with the full support from the Swiss Government. To date, SIC has already developed worldwide including Indonesia, Vietnam, Thailand, China and Malaysia. This year, UMK is working together with Putra Business School, DRB-Hicom University of Automotive Malaysia, Management and Science University and Swiss Malaysia Chamber of Commerce as strategic partners to  host the Swiss Innovation Challenge (SIC 2021) which will commence from July 2021 til Jan 2022. </p>

<p style="text-align:justify;font-size:16px">The participants in this competition will be SME’s, start-ups and higher education institution students from all ASEAN countries. This program aims to help entrepreneurs and potential entrepreneurs in innovation-based business and commercial development.
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

<?=$this->render('timeline', [    
    'dirAssests' => $dirAssests,
]);
?>

<?=$this->render('awards', [    
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
        

        <p style="text-align:center;font-size:18px;">Dr. Norzalizah Binti Bahari
        <br />+6017-607 8767 <br /> norzalizah.b@umk.edu.my
</p>

<p style="text-align:center;font-size:18px;">Dr. Zaminor Binti Zamzamir @ Zamzamin
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
