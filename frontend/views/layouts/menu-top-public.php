<?php 


use yii\helpers\Url;

?>


<header class="header1" style="height:80px">
		<!-- Header desktop -->
		<div class="container-menu-header">


			<div class="wrap_header">
			
			

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						<li>
                            <a href="<?php echo Url::to(['site/index'])?>">
                                Home</a>
                        </li><li>
                            <a href="#type-competition">
                                Competition Type</a>
                        </li><li>
                            <a href="#">
                                Awards</a>
                        </li><li>
                            <a href="<?php echo Url::to(['/user/login'])?>">
                                Login</a>
                        </li><li>
                            <a href="#contact-us">
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

