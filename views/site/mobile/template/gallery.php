<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use yii\widgets\LinkPager;
use app\widgets\Hot;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
  <div class="container">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      
      <div class="row">
        <?php foreach ($albums as $key => $album) {?>
          <div class="col-xs-12">
            <div class="thumbnail clearfix">
              <a href="<?php echo Url::to(['view-album','id'=>$album->id])?>" class="pic-thumbnail"  title="<?= $album->title;?>" target="_blank">
                <?php if($album->path){?>
                <div class="cover"><img src="<?= $album->path;?>" alt="" ></div>
                <?php }?>
                </a>
              <div class="caption">
                <h3><a href="<?php echo Url::to(['view-album','id'=>$album->id])?>" target="_blank"><?php echo $album->title?></a></h3></a>
              </div> 
            </div>
          </div>
        <?php }?>
      </div>
      </div>
    <?php if(isset($menu) && count($menu)>0){?>
      <div class="menu">
        <p>导航：</p>
      <ul class="nav nav-pills nav-justified">
        <?php foreach ($menu as $key => $m) {
        $current = strpos($url,$m->slug)?"class='active'":'';
        ?>
        <li role="presentation" <?php echo $current?>><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>"><?php echo $m->name;?></a></li>
        <?php }?>
      </ul>
      </div>
    <?php }?>
  </div>
