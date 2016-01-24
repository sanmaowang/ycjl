<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\MobileAsset;
use app\widgets\Nav;
use app\widgets\Links;
use yii\helpers\Url;

MobileAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<body>
  <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <?= Nav::widget();?>
  </div>
  </header>
  <?= $content ?>
  <footer class="bs-docs-footer" role="contentinfo">
    <div class="container">
    <p>鄂ICP备XXXXXXX号 &copy;2016 宜昌交通旅游集团</p>
    <p><?= Links::widget();?></p>
      <ul class="bs-docs-footer-links text-muted">
        <li><a href="http://www.ycjyjt.com/" target="_blank">宜昌交运集团</a></li>
        <li>·</li>
        <li><a href="http://www.ycbus.com/" target="_blank">宜昌公交集团</a></li>
        <li>·</li>
        <li><a href="http://www.xlxia.com/" target="_blank">西陵峡风景区</a></li>
      </ul>
    </div>
  </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
