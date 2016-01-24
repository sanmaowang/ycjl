<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '宜昌交旅 | 首页';
?>
<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>全局 CSS 样式</h1>
    <p>设置全局 CSS 样式；基本的 HTML 元素均可以通过 class 设置样式并得到增强效果；还有先进的栅格系统。</p>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
      <h3>企业动态</h3>
      <ul class="list-group">
        <?php if(isset($news)){
          for($i = 0;$i < 4; $i++){?>
        <li class="list-group-item"><a href="<?= Url::to(['site/view-post','id'=>$news[$i]->id]);?>" target="_blank"><?= $news[$i]->name;?></a><span><?php echo date("Y.m.d",$news[$i]->update_date);?></span></li>
        <?php }}?>
      </ul>
   	</div>
   	<div class="col-xs-12"> 
      <h3>图片新闻</h3>
      <div>
      <?php if(isset($staff)){?>
      <a href="<?= Url::to(['site/view-post','id'=>$staff->id]);?>" class="thumbnail"  target="_blank"><img src="<?= Yii::$app->request->baseUrl;?><?= $staff->thumb;?>" alt=""></a>
      <?php }?>
      </div>
		</div>
	</div>
</div>