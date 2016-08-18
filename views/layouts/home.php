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
    <meta http-equiv="keywords" content="宜昌交旅,宜昌交通旅游产业发展集团有限公司,宜昌交旅集团">
    <meta http-equiv="description" content="宜昌交通旅游产业发展集团有限公司（简称“交旅集团”）成立于2015年1月9日，为市政府直属重点企业，注册资本10亿元，总资产超过30亿元，员工总数5000余人。目前，旗下拥有宜昌交运、宜昌公交、三峡旅游度假区开发公司、交旅租车、交旅行胜、交旅行营6家子公司，其中宜昌交运为上市公司。
　　按照市委、市政府战略意图和工作部署，交旅集团以资本营运和产业发展为主导，采用市场化运作、公司化运营方式，创新发展现代交通，投资建设旅游新区，为宜昌建设现代化特大城市提供交通、旅游整体解决方案与特色旅游产品及专业整合服务。
　　自成立以来，交旅集团秉承“行方致远”的价值理念，实施“交通、旅游”两轮驱动，通过“并购一批、建设一批、合作一批”，大力推进项目投资开发，积极搭建“资源整合、基础建设、招商引资、资产证券化”平台，全面实施“统筹联动、创意创新、跨界融合、生态环保、人才振兴”战略，努力打造市值、投资双过百亿的交通旅游龙头企业。">
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
        鄂ICP备16001924号-1  鄂公网安备 42050202000049号</p>
<!--        <span class="light">技术支持：湖北元速科技有限公司</span>-->
      <p class="pull-right"><?= Links::widget();?></p>
<!--        <a class="beian" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42050202000049"><img src="--><?//= Yii::$app->request->baseUrl;?><!--/img/police.png" alt="" />  鄂公网安备 42050202000049号</a>-->
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
