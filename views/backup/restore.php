<?php
use yii\helpers\Html;

$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Manage',
		'url' => array (
				'index' 
		) 
];
$this->params['breadcrumbs'][]= [
'label'	=> 'Restore',
'url'	=> array('restore'),
];?>



<h1>
	
</h1>

<p>
	<?php if(isset($error)) echo $error; else echo '完成';?>
</p>
<p>
</p>
