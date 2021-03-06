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
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-1.png'); background-size:cover;" >
          <div class="inner">
            <h1>城市旅行先行者<br>美好空间开发商</h1>
          </div>
        </li>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-4.png'); background-size:cover;">
          <div class="inner">
            <h1>旅游交通整体方案与特色旅游产品<br>专业整合服务提供商</h1>
          </div>
        </li>
        <li style="background-image: url('<?php echo Yii::$app->request->baseUrl;?>img/mobile-slider-2.png'); background-size:cover;">
          <div class="inner">
            <h1>担纲旅游新区建设<br>引领文化旅游千亿产业发展</h1>
          </div>
        </li>

      </ul>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
      <div class="news-header" style="margin-top:0;">
        <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">最新动态</a> <span>LATEST NEWS</span></h2>
      </div>
      <ul class="media-list news-list">
        <?php if(isset($news)){
          for($i = 0;$i < count($news); $i++){
            if($news[$i]){
              $post = $news[$i];
        ?>
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <p><?php echo $post->shortintro;?></p>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
      <?php }}}?>
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