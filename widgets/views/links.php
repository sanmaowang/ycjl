<?php 
use yii\web\View;
use yii\helpers\Url;
?>
<?php 
  for($i = 0; $i <count($pages);$i++){
?>
  <a href="<?= Url::to(['site/page','slug'=>$pages[$i]->slug])?>"><?= $pages[$i]->name;?></a><?php if(($i+1)<count($pages)){?> | <?php }?>
<?php }
?>
