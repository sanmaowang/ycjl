<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use yii\widgets\LinkPager;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
  <div class="container">
      <?php if(isset($menu) && count($menu)>0){?>
        <div class="menu">
        <ul class="nav nav-pills">
          <?php foreach ($menu as $key => $m) {
          $current = strpos($url,$m->slug)?"class='active'":'';
          ?>
          <li role="presentation" <?php echo $current?>><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>"><?php echo $m->name;?></a></li>
          <?php }?>
        </ul>
        </div>
      <?php }?>
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
      </div>
      
      <div class="mobileImgRow row">
        <?php if(isset($posts) && count($posts)>0){?>
        <?php foreach ($posts as $key => $post) {?>
          <div class="col-xs-12">
            <div class="thumbnail clearfix">
              <?php if($post->thumb){?>
              <img src="<?= $post->thumb;?>" alt="">
              <?php }?>
              <div class="caption">
                <h3><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>" target="_blank"><?php echo $post->name;?></a></h3></a>
                <p><?= $post->excerpt;?></p>
                <p><span class="time"><?php echo date("Y年m月d日",$post->update_date);?></span></p>
              </div> 
            </div>
          </div>
        <?php }?>
        <?php }else {?>
          <p><br></p><p class="be-late text-center">内容待更新</p><p><br></p>
          <?php }?>
      </div>
      <div class="clearfix">
        <?= LinkPager::widget(['pagination' => $pnation]) ?>  
      </div> 
  </div>
