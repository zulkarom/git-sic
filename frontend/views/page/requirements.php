<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/swissAsset');

$this->title = 'Sign Up/Sign In';
$this->params['breadcrumbs'][] = $this->title;



$open = [
    
    'AGE' => 'No Limit',
    'BUSINESS OPERATION'	=> 'Less Than 2 years',
    'TEAM MEMBER'	=> '2-5 Person per Project',
    'SCOPE'	=> 'Creative & New Venture/ New Innovation',
    'FORMAT'=> 'Description of the Innovation and Business Model',
    'PROTOTYPE'=> 	'New Innovative Product',
    'PRESENTATION'	=> '3 Minutes Oral Q&A Session',
     'JUDGING FORMAT'=> 	'Product Innovation, Team Presentation, Creativity, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
    'REGISTRATION FEE'=> 	'RM200',
];


$startup = [
    'AGE'	=>'No Limit',
    'BUSINESS OPERATION'	=>'Pre-Startup Stage',
    'TEAM MEMBER'	=>'2-5 Person per Project',
    'SCOPE'	=>'New Innovation (Ideation or Prototype Development Phase)',
     'FORMAT'=>	'Description of the Innovation and Business Model',
    'PROTOTYPE'	=>'Not Required',
    'PRESENTATION'=>	'3 Minutes Oral Q&A Session',
    'JUDGING FORMAT'	=>'Product Innovation, Team, Presentation, Start-up, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
    'REGISTRATION FEE'=> 	'RM150',
    
];


$youth = [
    'AGE'	=>'25 years (Students)',
    'BUSINESS OPERATION'	=>'Pre-Startup Stage',
    'TEAM MEMBER'	=>'2-5 Person per Project',
    'SCOPE'	=>'New Innovation (Ideation or Prototype Development Phase)',
    'FORMAT'=>	'Description of the Innovation and Business Model',
    'PROTOTYPE'	=>'Not Required',
    'PRESENTATION'	=>'3 Minutes Oral Q&A Session',
     'JUDGING FORMAT'	=>'Product Innovation, Team, Presentation, Start-up, Scalability, Commercialisation potential, Impact & Sustainability, Q&A',
    'REGISTRATION FEE'=> 	'RM100',
];


?>




<div class="wrapper row3">
  <main class="hoc container clear" style="padding-top:40px;"> 
  

  
<div class="row">
	<div class="col-md-2"></div>
	
	
	
	<div class="col-md-8">
	
	<p style="text-align:justify;font-size:16px">
	
	 <h4 style="padding-bottom:30px;margin-top:30px">GENERAL REQUIREMENTS</h4>
	
	The innovation you proposed can be at the ideation, conceptualisation or planning phase. The innovation can be more mature in nature in that you have already worked with it before but feel that it can be developed further.
	</p>
	
	<p style="text-align:justify;font-size:16px">
	
	The application form including your innovation project outline of no more than 300 words must be completed in English.
	</p>
	
	<p style="text-align:justify;font-size:16px">
	At least one team member must be fluent in the English language as all communications including the admission interview (if necessary) will be conducted in English and all contents and materials of the programme will be available in English only.
	</p>
	
	<h4 style="padding-bottom:30px;margin-top:30px">COMPETITION FORMAT BY CATEGORIES</h4>
	
	
	<h5>SIC OPEN</h5>
	
	<ul>
	<?php foreach($open as $i => $o){
	
	    echo '<li><b>' . $i . '</b> : '. $o .'</li>';
	    
	}?>
	
	</ul>
	<br />
	<h5>SIC STARTUP</h5>
	
	<ul>
	<?php foreach($startup as $i => $o){
	
	    echo '<li><b>' . $i . '</b> : '. $o .'</li>';
	    
	}?>
	
	</ul>
	
		<br />
	<h5>SIC YOUTH</h5>
	
	<ul>
	<?php foreach($youth as $i => $o){
	
	    echo '<li><b>' . $i . '</b> : '. $o .'</li>';
	    
	}?>
	
	</ul>
	
	
	
	



	
	
	
	
	
	
	
	
	
	</div>
</div>


    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

