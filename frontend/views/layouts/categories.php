<?php 
use yii\helpers\Url;

?>


<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="heading" style="font-size: 30px;" id="type-competition">TYPE OF COMPETITION</h3>

    </div>
    <div id="latest" class="group" style="text-align:center;font-size:15px;">
    
    
    <?php 
    


$open = [
        
        'AGE' => 'No Limit',
        'BUSINESS OPERATION'	=> 'Less Than 2 years',
        //'TEAM MEMBER'	=> '2-5 Person per Project',
        'SCOPE'	=> 'Creative & New Venture/ <br />New Innovation',
        //'FORMAT'=> 'Description of the Innovation and Business Model',
        'PROTOTYPE'=> 	'New Innovative Product',
        //'PRESENTATION'	=> '3 Minutes Oral Q&A Session',
       // 'JUDGING FORMAT'=> 	'Product Innovation, Team Presentation, Creativity, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
        'REGISTRATION FEE'=> 	'RM200',
    ];
    
    
    $startup = [
    'AGE'	=>'No Limit',
    'BUSINESS OPERATION'	=>'Pre-Startup Stage',
    //'TEAM MEMBER'	=>'2-5 Person per Project',
    'SCOPE'	=>'New Innovation (Ideation or Prototype Development Phase)',
   // 'FORMAT'=>	'Description of the Innovation and Business Model',
    'PROTOTYPE'	=>'Not Required',
    //'PRESENTATION'=>	'3 Minutes Oral Q&A Session',
    //'JUDGING FORMAT'	=>'Product Innovation, Team, Presentation, Start-up, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
    'REGISTRATION FEE'=> 	'RM150',
    
    ];
    
    
    $youth = [
    'AGE'	=>'25 years and less',
    'BUSINESS OPERATION'	=>'Pre-Startup Stage',
    //'TEAM MEMBER'	=>'2-5 Person per Project',
    'SCOPE'	=>'New Innovation (Ideation or Prototype Development Phase)',
    //'FORMAT'=>	'Description of the Innovation and Business Model',
    'PROTOTYPE'	=>'Not Required',
    //'PRESENTATION'	=>'3 Minutes Oral Q&A Session',
   // 'JUDGING FORMAT'	=>'Product Innovation, Team, Presentation, Start-up, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
    'REGISTRATION FEE'=> 	'RM100',
    ];
    
    
    ?>
    
    
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	
	
	
	
  
           <article class="one_third first">
      

     
              <div class="excerpt">
              
                   
     <img src="<?= $dirAssests?>/images/open.png" />
              
              
              <h4 class="heading-category"> SIC OPEN</h4>
              
              
          <?php 
          
          foreach($open as $k => $o){
              echo '<p><strong>'. $k .'</strong><br />'  . $o . '</p>';
          }
          
          
          ?>
          

         
        </div>
      </article>
      
      
      <article class="one_third">
      
       
              <div class="excerpt">
              
              <img src="<?= $dirAssests?>/images/startup.png" />
       
       
         <h4 class="heading-category">SIC STARTUP</h4>
         
          <?php 
          
          foreach($startup as $k => $o){
              echo '<p><strong>'. $k .'</strong><br />'  . $o . '</p>';
          }
          
          
          ?>
          

         
        </div>
      </article>
     
      <article class="one_third">
      
       
              <div class="excerpt">
              
              <img src="<?= $dirAssests?>/images/youth.png" />
       
       
         <h4 class="heading-category">SIC YOUTH</h4>
         
         
          <?php 
          
          foreach($youth as $k => $o){
              echo '<p><strong>'. $k .'</strong><br />'  . $o . '</p>';
          }
          
          
          ?>
          

         
        </div>
      </article>
	
	
	
	
	</div>
</div>
    
    
      
  

      
      
    </div>
    
          <div class="form-group" align="center">

      <a href="<?php echo Url::to(['page/requirements'])?>" class="btn btn-outline-primary btn-lg">Read more on Requirements, Competition Format and Payment Instruction</a>

</div>

    <!-- ################################################################################################ -->
  </section>
</div>



