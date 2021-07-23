<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <h3>Reviewer Menu</h3>
  <nav class="sdb_holder">
        <ul>
                        <?=Menu::widget([
		//	['label' => \Yii::t('app', 'Home'), 'level' => 1, 'url' => ['/dashboard/index-admin']],

			['label' => \Yii::t('app', 'Applications'), 'level' => 1,'url' => ['/reviewer-application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'Log Out'), 'level' => 1,'url' => ['/site/logout'], 'icon' => 'mdi mdi-settings-box'],

		]
	
	)?>
                       
	    </ul>
	</nav>