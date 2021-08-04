<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;
use frontend\models\Website;


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');

$this->title = 'Sign Up/Sign In';
$this->params['breadcrumbs'][] = $this->title;




?>




<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:40px;"> 
  

  
<div class="row">
	<div class="col-md-2"></div>
	
	
	
	<div class="col-md-8" style="text-align:justify;font-size:16px">
	

	  <?=Website::findOne(4)->content?>   
	
	
	
	
	</div>
</div>


    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

