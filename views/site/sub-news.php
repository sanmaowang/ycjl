<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left">
        <div class="column-img">
          <img src="img/column/column-<?php echo $page->slug?>.png" alt="">
        </div>
        <?php if(isset($menu) && count($menu)>0){?>
        <ul>
          <?php foreach ($menu as $key => $m) {
            $current = strpos($url,$m->slug)?"class='current'":'';
          ?>
            <li><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>><?php echo $m->name;?></a></li>
          <?php }?>
        </ul>
        <?php }?>
      </div>
    <div class="main-right">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      <div class="news-main">
      <div class="news-left">
        <div class="news-header">
          <h2>最新动态 <span>LATEST NEWS</span></h2>
        </div>
        <div class="news-list">
          <ul>
            <?php foreach ($page->posts as $key => $post) {?>
              <li <?php if($key==0){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo $post->name;?></a> <span class="time"><?php echo $post->update_date;?></span></li>
            <?php }?>
          </ul>
        </div>
      </div>
      <div class="news-right">
        <div class="news-header">
          <h2>图片新闻 <span>PHOTO NEWS</span></h2>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
