<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Menu;
use yii\helpers\Url;

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
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl."/css/style.min.css"?>">
</head>
<body <?php if(\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'index'){ echo 'class="home"';}?>>
<?php $this->beginBody() ?>
<div class="wrap">
<div class="top-nav">
  <div class="container">
    <div class="row">
      <div class="top-nav-link">
      <ul class="top-links">
        <li>
          <a href="">集团网站群</a>
          <div class="links-level-two">
            <dl>
              <dd><a href="">某网站</a></dd>
              <dd><a href="">某网站</a></dd>
              <dd><a href="">某网站</a></dd>
            </dl>
          </div>
        </li>
      </ul>
      <input type="text" placeholder="搜索.." class="top-search"/>
      </div>
    </div>
  </div>
</div>
<div class="header">
  <div class="container">
    <a href="<?= Url::to(['site/index'])?>" class="logo">
      <h1>宜昌交旅</h1>
    </a>
    <?= Menu::widget();?>
  </div>
</div>
<?= $content ?>
<div class="footer">
  <div class="container">
    <ul class="clearfix">
      <li class="li_1"><a href="">实业投资</a></li>
      <li class="li_2"><a href="">交运集团</a></li>
      <li class="li_3"><a href="">旅游景点开发</a></li>
      <li class="li_4"><a href="">旅游交通线路</a></li>
      <li class="li_5"><a href="">旅游规划设计</a></li>
      <li class="li_6"><a href="">宜昌酒店</a></li>
      <li class="li_7"><a href="">旅行社</a></li>
    </ul>
    <div class="links">
      <p class="pull-left">&copy; 宜昌交通旅游集团 2015 ALL RIGHTS RESERVED</p>
      <p class="pull-right">联系电话：0717-7899889  地址：宜昌市云集路**号</p>
    </div>
  </div>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
