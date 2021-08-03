<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <h3>Admin Menu</h3>
  <nav class="sdb_holder">
        <ul>
                        <?=Menu::widget([
		//	['label' => \Yii::t('app', 'Home'), 'level' => 1, 'url' => ['/dashboard/index-admin']],

			['label' => \Yii::t('app', 'All Applications'), 'level' => 1,'url' => ['/admin-application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'All Users'), 'level' => 1, 'url' => ['/user-list/index']],
                            
           ['label' => \Yii::t('app', 'Update Intro'), 'level' => 1, 'url' => ['/admin-setting/index']],
                            
           ['label' => \Yii::t('app', 'Update Timeline'), 'level' => 1, 'url' => ['/admin-setting/dates']],
		]
	
	)?>
                       
	    </ul>
	</nav>