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
<?php 
$url = \Yii::$app->request->url;
$g1_slug = array('introduction','about','chairman','struction','develop','subsidiary','ycjyjt','ycgjjt','ycsxlydjq','ycqczl');
$g2_slug = array('culture','idea','group-vi','activity','staff');
$g3_slug=array('news','group-news','industry-news','media-focus');
$g4_slug=array('business','trafic','travel');
$g4_slug = array('party','party-construction','qunzhong','board');
$g5_slug= array('theme','sanyansanshi');
$g6_slug = array('hr','about-human-resource','job');
$g_slug = array('home','introduction','about','chairman','struction','develop','subsidiary','culture','idea','group-vi','activity','staff','news','group-news','industry-news','media-focus','business','trafic','travel','party','party-construction','qunzhong','board','theme','sanyansanshi','hr','about-human-resource','job','ycjyjt','ycgjjt','ycsxlydjq','ycqczl');
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
