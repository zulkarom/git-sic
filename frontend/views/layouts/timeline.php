<?php 
use yii\helpers\Url;
use frontend\models\Timeline;



$list = Timeline::find()->all();
?>


<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle" style="margin-bottom: 5px">
      <h3 class="heading" style="font-size: 30px;" id="important-dates">IMPORTANT DATES & TIMELINE</h3>

    </div>
    
    
    
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	
	
	
	<div class="container">

    <ul class="timeline">
    
    <?php  
    $state = 1;
    foreach($list as $time){
        $state = ($state == 1 ? 0 : 1);
        
        $class = $state == 0 ? '' : 'class="timeline-inverted"';
        ?>
        <li<?=' '.$class?>>
          <div class="timeline-badge <?=$time->color?>"><i class="fa fa-<?=$time->icon?>"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><?=$time->title?></h4>

            </div>
            <div class="timeline-body">
       
            <i class="fa fa-calendar-check"></i> <?=$time->date?>
            <hr>
              <p><?=$time->description?></p>
            </div>
          </div>
        </li>
        
        
        <?php 
    }

    ?>
    
    
      
    </ul>
</div>
	
	
	
	
	
	
	
	
	</div>
</div>

    




    <!-- ################################################################################################ -->
  </section>
</div>



