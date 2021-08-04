<?php 
use yii\helpers\Url;
use frontend\models\Categories;

?>


<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="heading" style="font-size: 30px;" id="type-competition">TYPE OF COMPETITION</h3>

    </div>
    <div id="latest" class="group" style="text-align:center;font-size:15px;">

    
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	
	
<?php 

$categories = Categories::find()->all();


foreach($categories as $i => $category){

$first = $i == 0 ? 'first' : '';


?>
  <article class="one_third <?=$first?>">

              <div class="excerpt">
              
                   
     <img src="<?= $dirAssests?>/images/<?=$category->image?>" />
              
              
              <h4 class="heading-category"> <?=strtoupper($category->cat_name)?></h4>
              
              
          <?php 
          
          $order = $category->sorting();
          $label = $category->attributeLabels();
          
          foreach($order as $k => $o){
              echo '<p><strong>'. $label[$o] .'</strong><br />'  . nl2br($category->$o) . '</p>';
          }
          
          
          ?>
          

         
        </div>
      </article>



<?php }


?>
	
	
	
	
	
	</div>
</div>
    
    
      
  

      
      
    </div>
    
          <div class="form-group" align="center">

      <a href="<?php echo Url::to(['page/requirements'])?>" class="btn btn-outline-primary btn-lg">Read more on Requirements and Competition Format</a>

</div>

    <!-- ################################################################################################ -->
  </section>
</div>



