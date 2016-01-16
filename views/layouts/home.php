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
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="home">
<?php $this->beginBody() ?>
<div class="wrap">
<?= $this->render('_top-nav') ?>
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
    <div class="row">
    <div class="links">
      <p class="pull-left">&copy; 宜昌交通旅游集团 2015 ALL RIGHTS RESERVED</p>
      <p class="pull-right"><a href="">联系方式</a> | <a href="">隐私声明</a> | <a href="">使用条款</a> | <a href="">网站地图</a>  </p>
    </div>
    </div>
  </div>
</div>
</div>
<?php $this->registerJsFile('@web/js/base.js',['depends' => [\yii\web\JqueryAsset::className()]]);?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
