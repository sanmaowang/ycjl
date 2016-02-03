<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '宜昌交旅 | 首页';
?>
<div id="content" tabindex="-1">
    <div class="banner-slider">
      <ul>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-1.png');">
          <div class="inner">
            <h1>城市旅行先行者<br>美好空间开发商</h1>
          </div>
        </li>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-2.png');">
          <div class="inner" style="padding-top:30px;">
            <h3>城市旅游先行<br>休闲度假主创</h3><h3>旅游新区担纲<br>千亿产业头羊</h3>
          </div>
        </li>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-3.png');">
          <div class="inner">
            <h1>担纲旅游新区建设<br>引领文化旅游千亿产业发展</h1>
          </div>
        </li>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-4.png');">
          <div class="inner">
            <h1>旅游交通整体方案与特色旅游产品专业整合服务提供商</h1>
          </div>
        </li>
      </ul>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
      <div class="news-header" style="margin-top:0;">
        <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">企业动态</a> <span>ENTERPRISE NEWS</span></h2>
      </div>
      <?php if(isset($news)){
        foreach ($news as $key => $post) {
      ?>
      <ul class="media-list news-list">
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <?php echo $post->shortintro;?>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
        <?php }}?>
      </ul>
   	</div>
	</div>
</div>
<?php 
$this->registerCssFile('@web/js/unslider/css/unslider.css');//注册自定义js
$this->registerCssFile('@web/js/unslider/css/unslider-dots.css');//注册自定义js
$this->registerJsFile('@web/js/unslider/js/unslider-min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function(){
  $('.banner-slider').unslider({
    speed: 800,       
    delay: 4000,  
    autoplay: true,
    arrows: false,

  });
})",View::POS_END,'show');
?>