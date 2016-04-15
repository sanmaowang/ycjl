<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\HomeAsset;
use app\widgets\Menus;
use app\widgets\Links;
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
    <?= Menus::widget();?>
  </div>
</div>
<?= $content ?>
<div class="footer">
  <div class="container">
    <div class="support">&copy; 2016 宜昌交通旅游产业发展集团有限公司</div>
    <div class="row">
    <div class="links">
      <p class="pull-left">
        鄂ICP备16001924号-1 <span class="light">技术支持：湖北元速科技有限公司</span></p>
      <p class="pull-right"><?= Links::widget();?> </p>
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
