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
          <img src="<?= Yii::$app->request->baseUrl;?>/img/column/column-<?php echo $page->slug?>.png" alt="">
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
        <div class="news-image-column">
        <div class="row">
          <?php foreach ($albums as $key => $album) {?>
            <div class="col-xs-4">
              <a href="<?php echo Url::to(['view-album','id'=>$album->id])?>" class="pic-thumbnail">
              <?php if($album->path){?>
              <div class="cover"><img src="<?= $album->path;?>" alt="" ></div>
              <?php }?>
              <div class="caption">
              <b><?php echo $album->title;?></b>
              </div>
              </a>
            </div>
          <?php }?>
        </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

