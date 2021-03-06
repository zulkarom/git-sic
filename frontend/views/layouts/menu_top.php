<?php 


use yii\helpers\Url;

?>


<?php 

if (\Yii::$app->user->isGuest) {
    $menus = [
        
        'Home' => ['site/index'],
        'Competition Type' => ['/site/index', '#' => 'type-competition'],
        'Awards' => ['/site/index', '#' => 'awards'],
        'Important Dates' => ['/site/index', '#' => 'important-dates'],
        'Main Committee' => ['/site/index', '#' => 'board'],
        'Login' => ['/site/login'],
        'Contact Us' => ['/site/index', '#' => 'contact-us'],
    ];
}else{
    
    
    
    
    $items['Home'] =  ['/site/index'];
    $items['My Application'] =  ['/application/index'];
    
    if(Yii::$app->user->identity->is_reviewer == 1){
        $items['My Review'] =  ['/reviewer-application/index'];
    }
    
    
    if(Yii::$app->user->identity->is_judge == 1){
        $items['My Judge'] =  ['/judge-application/index'];
    }
    
    if(Yii::$app->user->identity->is_admin == 1){
        $items['Manage'] =  ['/admin-application/index'];
    }
    
    $session = Yii::$app->session;
    if ($session->has('or-usr')){
        $items['<i class="fas fa-sign-out-alt"></i> Return Role'] =  ['/user-list/return-role'];
    }else{
        $items['<i class="fas fa-sign-out-alt"></i> Log Out'] =  ['/site/logout'];
    }
    
    
    
    
    
    $menus = $items;
    
    
}


?>


<header class="header1" style="height:80px">
		<!-- Header desktop -->
		<div class="container-menu-header">


			<div class="wrap_header">
			
			

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						
						<?php 
						foreach($menus as $t => $m){
						    echo '<li>
                            <a href="'. Url::to($m). '">
                                '. $t .'</a>
                        </li>';
						}
						
						?>
						
						
							
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					
						<?php if (!\Yii::$app->user->isGuest) {
						?>
						
						
						<div class="header-wrapicon2">
						<a href="#" class="header-icon1 js-show-header-dropdown">
						<img src="<?= $dirAssests?>/images/user.png" alt="ICON">
						<?=Yii::$app->user->identity->fullname?> </a>

						<!-- Header cart noti -->
				
					</div>
						
						
						
						<?php }?>				
					

				
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
				
				
				<?php 
						foreach($menus as $t => $m){
						    echo '<li class="item-menu-mobile">
                            <a href="'. Url::to($m). '">
                                '. $t .'</a>
                        </li>';
						}
						
						?>
				
		
					
				</ul>
			</nav>
		</div>
	</header>

