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
        <div class="news-header type-header">
          <h2>最新动态 <span>LATEST NEWS</span></h2>
        </div>
        <div class="news-list">
          <ul>
            <?php foreach ($page->posts as $key => $post) {?>
              <li class="thumbnail clearfix">
                <?php if($post->thumb){?>
                  <div class="thumb">
                    <img src="<?= $post->thumb;?>" alt="">
                  </div>
                <?php }?>
                <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><h3><?php echo $post->name;?><span class="time"><?php echo date("Y年m月d日",$post->update_date);?></span></h3></a>
                <div class="desc">
                  <?= $post->excerpt;?>
                </div> 
                 </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
