<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <nav class="sdb_holder">
        <ul>
                        <?=Menu::widget([
			['label' => \Yii::t('app', 'Home'), 'level' => 1, 'url' => ['/dashboard/index-admin']],

			['label' => \Yii::t('app', 'Applications'), 'level' => 1,'url' => ['/admin-application/index'], 'icon' => 'mdi mdi-settings-box'],
		]
	
	)?>
                       
	    </ul>
	</nav>