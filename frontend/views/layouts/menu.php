<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <nav class="sdb_holder">
        <ul>
                        <?=Menu::widget([
			['label' => \Yii::t('app', 'Home'), 'level' => 1, 'url' => ['/application/index']],

			['label' => \Yii::t('app', 'My Application'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'My Award'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'My Result'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'My Session'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],
		
		]
	
	)?>
                       
	    </ul>
	</nav>