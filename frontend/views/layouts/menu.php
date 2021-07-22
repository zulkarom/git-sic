<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
      <h3>Participant Menu</h3>
  <nav class="sdb_holder">
        <ul>
                        <?=Menu::widget([
		//	['label' => \Yii::t('app', 'Home'), 'level' => 1, 'url' => ['/application/index']],

			['label' => \Yii::t('app', 'My Application'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],

			['label' => \Yii::t('app', 'My Payment'), 'level' => 1,'url' => ['/application/payment'], 'icon' => 'mdi mdi-settings-box'],

		//	['label' => \Yii::t('app', 'My Pitching'), 'level' => 1,'url' => ['/application/pitching'], 'icon' => 'mdi mdi-settings-box'],

			//['label' => \Yii::t('app', 'My Profile'), 'level' => 1,'url' => ['/application/index'], 'icon' => 'mdi mdi-settings-box'],
                            
             ['label' => \Yii::t('app', 'Log Out'), 'level' => 1,'url' => ['/site/logout'], 'icon' => 'mdi mdi-settings-box'],
		
		]
	
	)?>
                       
	    </ul>
	</nav>