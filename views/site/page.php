<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left pull-left">
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
    <div class="main-right pull-right">
      <div class="postit">
        <p>当前位置：<a href="#">首页</a> > <a href="#">集团概况</a><span></span></p>
      </div><!-- postit end -->
        <div class="content">
        <h1 class="column-<?php echo $page->slug;?>"><?php echo $page->name;?></h1>
        <?php echo $page->content;?>
        </div><!-- about_info end -->
      </div>
    </div>
  </div>
</div>
