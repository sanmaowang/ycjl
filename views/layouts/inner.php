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
<?php 
$url = \Yii::$app->request->url;
$g1_slug = array('introduction','about','chairman','struction','develop','subsidiary','ycjyjt','ycgjjt','ycsxlydjq','ycqczl');
$g2_slug = array('culture','idea','group_vi','activity','staff');
$g3_slug=array('news','group_news','industry_news','media_focus');
$g4_slug=array('business','traffic','travel');
$g4_slug = array('party','party_construction','quntuan','board');
$g5_slug= array('theme','sanyansanshi');
$g6_slug = array('public','notice','job');
$g_slug = array('home','introduction','about','chairman','struction','develop','subsidiary','culture','idea','group_vi','activity','staff','news','group_news','industry_news','media_focus','business','traffic','travel','party','party_construction','quntuan','board','theme','sanyansanshi','public','notice','job','ycjyjt','ycgjjt','ycsxlydjq','ycqczl');
$inner = '';
for ($i = 0;$i < count($g_slug);$i++){
  if(strpos($url,$g_slug[$i])){
    if($i <= 6 || $i >= count($g_slug)-4){
      $inner = '';
    }else if($i <= 11){
      $inner = 'inner-1';
    }else if($i <= 15){
      $inner = 'inner-2';
    }else if($i <= 18){
      $inner = 'inner-3';
    }else if($i <= 22){
      $inner = 'inner-2';
    }else if($i <= 24){
      $inner = 'inner-1';
    }
  }
}
?>
<body <?php echo 'class="'.$inner.'"';?>>
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
    <div class="support">&copy; 宜昌交通旅游产业发展集团有限公司 2016 ALL RIGHTS RESERVED</div>
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
