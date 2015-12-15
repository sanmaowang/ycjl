<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl."/css/style.css"?>">
</head>
<body>
<?php $this->beginBody() ?>
<div class="top-nav">
  <div class="select-link">
    <select name="" id="">
      <option value="">集团网站群</option>
    </select>
  </div>
  <div class="search">
    <input type="text" placeholder="搜索.."/>
  </div>
</div>
<div class="header">
  <a class="logo">
    <h1>宜昌交旅</h1>
  </a>
  <div class="nav">
    <ul>
      <li><a href="">首页</a></li>
      <li><a href="">企业简介</a></li>
      <li><a href="">新闻中心</a></li>
      <li><a href="">主营业务</a></li>
      <li><a href="">专题报道</a></li>
      <li><a href="">公共信息</a></li>
    </ul>
  </div>
</div>
<div class="wrap">
  <?= $content ?>
</div>
<div class="footer">
  <div class="container">
    <p class="pull-left">&copy; 宜昌交通旅游集团 <?= date('Y') ?> ALL RIGHTS RESERVED</p>
    <p class="pull-right">联系电话：0717-7899889  地址：宜昌市云集路**号</p>
  </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
