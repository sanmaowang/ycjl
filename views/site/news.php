<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <div class="postit">
          <p>当前位置：<a href="#">首页</a> > <a href="#">集团概况</a><span></span></p>
        </div>
      </div>
      <div class="news-left">
        <div class="news-header">
          <h2>最新资讯 <span>LATEST NEWS</span></h2>
        </div>
        <div class="news-list">
          <ul>
            <li class="first"><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
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
