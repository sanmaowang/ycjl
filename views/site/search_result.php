<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = '搜索结果';
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="page-header">
        <div class="page-title">
          <h1>搜索结果</h1>
          <h2>SEARCH RESULT</h2>
        </div>
        <div class="postit">
          <p>
            当前位置：<a href="<?php echo Url::to(['site/index'])?>">首页</a> > 
            搜索结果
          </p>
        </div>
      </div>
      <div class="news-main">
        <div class="news-header type-header">
          <h2>搜索 "<b style="color:red;"><?= $search_key;?></b>" 的结果列表 <span>RESULT LIST</span></h2>
        </div>
        <div class="news-list">
          <ul>
            <?php foreach ($model as $key => $post) {?>
            <?php if(isset($post)){?>
              <li class="thumbnail clearfix">
                <?php if(isset($post->thumb)){?>
                  <div class="thumb">
                    <img src="<?= $post->thumb;?>" alt="">
                  </div>
                <?php }?>
                <a href="<?php echo Url::to(['view-post','id'=>1])?>">
                  <h3><?php if(isset($post->name)){ echo $post->name;}?>
                    <span class="time"><?php if(isset($post->update_date)){ echo date("Y年m月d日",$post->update_date);}?></span>
                  </h3>
                </a>
                <div class="desc">
                  <?= $post->excerpt;?>
                </div> 
                </li>
            <?php }}?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
