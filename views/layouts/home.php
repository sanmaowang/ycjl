<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\HomeAsset;
use app\widgets\Menu;
use yii\helpers\Url;

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="home">
  <div id="home_slider" class="bg-slider">
    <ul class="imgList">
      <li class="imgOn home-slider-1">
        <div class="slogan-1"></div>
      </li>
      <li class="home-slider-2">
        <div class="slogan-2"></div>
      </li>
      <li class="home-slider-3">
        <div class="slogan-3"></div>
      </li>
    </ul>
  </div>
<?php $this->beginBody() ?>
<div class="wrap">
<div class="top-nav">
  <div class="container">
    <div class="row">
      <div class="top-quick-link">
        <a href="#">设为首页</a>
        <a href="#">加入收藏</a>
      </div>
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
      <li class="li_1"><a href=""><i class="icon-footer-symbol"></i>实业投资</a></li>
      <li class="li_2"><a href=""><i class="icon-footer-symbol"></i>交运集团</a></li>
      <li class="li_3"><a href=""><i class="icon-footer-symbol"></i>旅游景点开发</a></li>
      <li class="li_4"><a href=""><i class="icon-footer-symbol"></i>旅游交通线路</a></li>
      <li class="li_5"><a href=""><i class="icon-footer-symbol"></i>旅游规划设计</a></li>
      <li class="li_6"><a href=""><i class="icon-footer-symbol"></i>宜昌酒店</a></li>
      <li class="li_7"><a href=""><i class="icon-footer-symbol"></i>旅行社</a></li>
    </ul>
    <div class="links">
      <p class="pull-left" style="margin-left:3em;">&copy; 宜昌交通旅游集团 2015 ALL RIGHTS RESERVED</p>
      <p class="pull-right" style="margin-right:3em;"><a href="">联系方式</a> | <a href="">隐私声明</a> | <a href="">使用条款</a> | <a href="">网站地图</a>  </p>
    </div>
  </div>
</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
