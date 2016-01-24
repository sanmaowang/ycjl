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
      <div class="news-header" style="margin-top:0;">
        <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">企业动态</a> <span>ENTERPRISE NEWS</span></h2>
      </div>
      <?php if(isset($news)){
        for($i = 0;$i < 4; $i++){
          $post = $news[$i];?>
      <ul class="media-list news-list">
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <?php echo $post->shortintro;?>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
        <?php }}?>
      </ul>
   	</div>
	</div>
</div>