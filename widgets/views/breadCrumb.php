<?php 
use yii\web\View;
use yii\helpers\Url;
?>
<div class="postit">
  <p>
    当前位置：<a href="<?php echo Url::to(['site/index'])?>">首页</a> > 
    <?php if($parent){ ?>
      <a href="<?php echo Url::to(['site/page','slug'=>$parent->slug])?>"><?= $parent->name;?></a> > 
    <?php }?>
    <?php if($current_page){ ?>
      <a href="<?php echo Url::to(['site/page','slug'=>$current_page->slug])?>"><?= $current_page->name;?></a>
    <?php }?>
  </p>
</div>
