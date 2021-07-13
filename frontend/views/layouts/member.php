<?php
use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\SwissAsset;
use backend\assets\AppAsset;
use kartik\widgets\ActiveForm;

SwissAsset::register($this);
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/swissAsset');
$this->title = 'My Application';
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

<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:30px"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sidebar one_quarter first"> 
       <div class="sdb_holder">
        <h3>My Profile</h3>
        <address>
        Full Name<br>
        Email <br>
    <p><?= Html::a('<i class="fas fa-sign-out-alt"></i>  Log Out ',['/site/logout'],['data-method' => 'post', 'class' => 'btn btn-danger btn-sm']) ?>
    </p>
        
        </address>
      </div>
    
      <h3>Participant Menu</h3>
    
      <nav class="sdb_holder">
        <ul>
          <li><a href="index.html">Home</a></li>
      <li><a href="#">My Application</a>

          </li>
          <li><a href="#">My Award</a>

          </li>

          <li><a href="#">My Result</a></li>
      
      <li><a href="#">My Session</a>

          </li>  
        </ul>
      </nav>
     

      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="content three_quarter"> 
      <!-- ################################################################################################ -->
      
    <div class="row form-group">
      <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>

      
        <div class="col-md-6" align="right">
          <?= Html::a('<i class="fas fa-plus"></i>  Apply New ',['/application/create'],['data-method' => 'post', 'class' => 'btn btn-success btn-sm']) ?>
        </div>
     
    </div>

    
    <?= Alert::widget() ?>
    <?= $content ?>

    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
   
    </div>
    <div class="one_third">
      
    </div>
    <div class="one_third">
      
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
