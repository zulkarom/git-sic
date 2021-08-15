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
                            
           ['label' => \Yii::t('app', 'Web Intro'), 'level' => 1, 'url' => ['/admin-setting/index']],
                            
           ['label' => \Yii::t('app', 'Dates and Timeline'), 'level' => 1, 'url' => ['/admin-setting/dates']],
                            
           ['label' => \Yii::t('app', 'Categories'), 'level' => 1, 'url' => ['/admin-setting/categories']],
                            

           ['label' => \Yii::t('app', 'Payment Info'), 'level' => 1, 'url' => ['/admin-setting/payment']],
                            
           ['label' => \Yii::t('app', 'Requirement Page'), 'level' => 1, 'url' => ['/admin-setting/requirement']],
                            
           ['label' => \Yii::t('app', 'Contact'), 'level' => 1, 'url' => ['/admin-setting/contact']],
		]
	
	)?>
                       
	    </ul>
	</nav>