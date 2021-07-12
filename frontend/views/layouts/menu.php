<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    	<li class="nav-devider"></li>
                        <?=Menu::widget([
			['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/site/index'], 'icon' => 'mdi mdi-gauge', 'children' => []],

			['label' => \Yii::t('app', 'Entrepreneur Profile'), 'level' => 1,'url' => ['/usahawan/profile/index'], 'icon' => 'mdi mdi-settings-box'],


			['label' => \Yii::t('app', 'Sector'), 'level' => 0],
                            
            ['label' => \Yii::t('app', 'Agriculture'), 'level' => 1, 'url' => ['/account/invoice/index'], 'icon' => 'mdi mdi-file-check', 'children' => []],
                            
             ['label' => \Yii::t('app', 'Restaurant'), 'level' => 1, 'url' => ['/account/client-payment/index'], 'icon' => 'mdi mdi-currency-usd', 'children' => []],
                            
          ['label' => \Yii::t('app', 'LiveStock'), 'level' => 1, 'url' => ['/account/pv/index'], 'icon' => 'mdi mdi-credit-card', 'children' => []],
		
		]
	
	)?>
                       
                    </ul>
                </nav>