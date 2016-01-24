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
          <?php foreach ($page->posts as $key => $post) {?>
            <div class="col-xs-4">
              <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>" class="pic-thumbnail">
              <?php if($post->thumb){?>
              <div class="cover"><img src="<?= $post->thumb;?>" alt="" ></div>
              <?php }?>
              <div class="caption">
              <b><?php echo $post->name;?></b>
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

