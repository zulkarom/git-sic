<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');

$this->title = 'Sign Up/Sign In';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:40px;"> 
  
  <h2 style="padding-bottom:40px;text-align:center">LOGIN OR REGISTER TO SUBMIT OR VIEW YOUR APPLICATION.</h2>
  
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sidebar one_half first"> 
        <h3>LOGIN</h3>
        
        <div class="row">
        <div class="col-md-10">
        
        <form action="#" method="post">
          <div class="form-group">
            <label for="name">Email <span>*</span></label>
            <input type="text" name="name" id="name" value="" class="form-control form-control-lg" size="22" required>
          </div>
          <div class="form-group">
            <label for="email">Password <span>*</span></label>
            <input type="email" name="email" id="email" class="form-control form-control-lg" value="" size="22" required>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-danger" value="Submit Form"><i class="fas fa-sign-in-alt"></i>  Log in  </button>
          </div>
        </form>
        
        
        </div>
        <div></div>
        </div>
        
        
        
        
        

      

    </div>

    <div class="content one_half"> 

      <h3>REGISTER</h3>
      
      
      <div class="row">
        <div class="col-md-10">
        
        <form action="#" method="post">
          <div class="form-group">
            <label for="name">Email <span>*</span></label>
            <input type="text" name="name" id="name" value="" class="form-control form-control-lg" size="22" required>
          </div>
          <div class="form-group">
            <label for="email">Password <span>*</span></label>
            <input type="password" name="email" id="email" class="form-control form-control-lg" value="" size="22" required>
          </div>
          
          <div class="form-group">
            <label for="email">Repeat Password <span>*</span></label>
            <input type="password" name="email" id="email" class="form-control form-control-lg" value="" size="22" required>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-danger" value="Submit Form"><i class="fas fa-sign-in-alt"></i>  Register  </button>
          </div>
        </form>
        
        
        </div>
        <div></div>
        </div>
        
      
      
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

