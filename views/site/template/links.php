<?php

/* @var $this yii\web\View */

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use app\widgets\Hot;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left">
        <div class="column-img">
          <img src="<?= Yii::$app->request->baseUrl;?>/img/column/column-<?php echo $page->slug?>.png" alt="">
        </div>
        <?php if(isset($menu) && count($menu)>0){?>
        <ul>
          <?php foreach ($menu as $key => $m) {
            $current = strpos($url,$m->slug)?"class='current'":'';
          ?>
            <li><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>><?php echo $m->name;?></a></li>
          <?php }?>
        </ul>
        <?php }?>
      </div>
    <div class="main-right">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      <div id="content" class="content <?php echo $page->slug;?>">
        <?php if(isset($page->content) && $page->content != ""){?>
        <?php echo $page->content;?>
        <?php }else{?>
          <p><br></p><p class="be-late">内容待更新</p><p><br></p>
          <?php }?>
      </div>
    </div>
    </div>
  </div>
</div>

