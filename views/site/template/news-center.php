<?php

/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();

function utf8_strlen($string = null) {
  preg_match_all("/./us", $string, $match);
  return count($match[0]);
}
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      <div class="news-topic">
        <div class="news-slide">
          <div class="slideshow">
            <ul>
              <?php $j=0; foreach($headlines as $key=>$h){?>
              <?php if($h->thumb){?>
              <li>
                <a href="<?= Url::to(['view-post','id'=>$h->id])?>"  title="<?= $h->name;?>" target="_blank">
                  <img src="<?php echo $h->thumb;?>" alt="">
                </a>
                <div class="slide-title">
                  <h4><?php echo $h->name;?></h4>
                </div>
                <div class="slide-mask"></div>
              </li>
              <?php 
               $j++;
               if($j>3){ break;}
              }}?>
            </ul>
          </div>
        </div>
        
        <div class="news-topic-main">
          <div class="news-header news-topic-header">
            <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">企业动态</a> <span>ENTERPRISE NEWS</span></h2>
          </div>
          <div class="news-headline">
            <ul class="ulist mix-ulist">
              <?php
              $i = 0;
              foreach ($group_news as $key => $post) {
                if($post->page_id == 14){
                  if($i == 8){
                    break;
                  }
              ?>
                <li><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>" title="<?= $post->name;?>" target="_blank"><?php echo $post->name;?><?php $days = (strtotime(date("Y-m-d")) -  $post->update_date)/86400; if($days <= 4){?><img class="newest-icon2" src="<?= Yii::$app->request->baseUrl;?>/img/newest.png" alt=""/><?php } else{ }  ?></a> <?php  if($days <= 4){if(strlen($post->name)>84){?><img class="newest-icon3" src="<?= Yii::$app->request->baseUrl;?>/img/newest.png" alt=""/><?php }}?><span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php 
                $i++;
              }}?>
            </ul>
          </div>
        </div>
      </div>
      <div class="pic-topic-main">
        <div class="mod" id="huanqiu">
          <div class="hd line"><h3><a href="<?= Url::to(['site/page','slug'=>'picnews'])?>">图片新闻</a></h3></div>
          <div class="bd">
            <div class="mar-left">
            <a id="mar-left" href="#"></a>
            </div>
            <div id="mar" class="image-list">
              <div class="image-list-wrapper">
              <?php 
                $j = 0;
              foreach ($pic_news as $key => $post) {
              ?>
              <div class="image-list-item">
                  <a href="<?= Url::to(['view-album','id'=>$post->id])?>"  title="<?= $post->title;?>" target="_blank">
                    <img src="<?= Yii::$app->request->baseUrl;?><?= $post->path;?>">
                  </a>
                  <a href="<?= Url::to(['view-album','id'=>$post->id])?>" class="txt" target="_blank"><?php echo $post->title;?></a>
              </div>
              <?php $j++; if($j == 10){break;} }?>
              </div>
            </div>
            <div class="mar-right">
              <a id="mar-right" href="#">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
        <div class="col-news-left">
          <div class="news-header" style="padding-right:35px;">
            <h2><a href="<?= Url::to(['site/page','slug'=>'industry_news'])?>">行业资讯</a> <span>INDUSTRY NEWS</span></h2>
          </div>
            <div class="news-list">
              <ul>
            <?php 
              for($j = 0; $j < count($industry_news); $j++){
                $post = $industry_news[$j];
                if($post){
            ?>
                <li <?php if($j == 0){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"  title="<?= $post->name;?>" target="_blank"><?php echo $post->name;?></a> <span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php }}?>
            </ul>
          </div>
        </div>
        <div class="col-news-column-right">
          <div class="news-header">
            <h2><a href="<?= Url::to(['site/page','slug'=>'media_focus'])?>">媒体聚焦</a> <span>MEDIA FOCUS</span></h2>
          </div>
          <div class="news-list">
            <ul>
            <?php 
              for($j = 0; $j < count($media_news); $j++){
                $post = $media_news[$j];
                if($post){
            ?>
                <li <?php if($j == 0){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"  title="<?= $post->name;?>" target="_blank"><?php echo $post->name;?></a> <span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php }}?>
            </ul>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
$this->registerCssFile('@web/js/unslider/css/unslider.css');//注册自定义js
$this->registerCssFile('@web/js/unslider/css/unslider-dots.css');//注册自定义js
$this->registerJsFile('@web/js/unslider/js/unslider-min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/marquee.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function(){
  $('.slideshow').unslider({
    speed: 800,       
    delay: 4000,  
    autoplay: true,
    nav: true,
    arrows: false,
  });
  $('#mar').marquee({
    showNum: 10,
    auto: true,
    prevElement: $('#mar-left'),
    nextElement: $('#mar-right'),
  });
  $(document).on('mouseover','.unslider-nav li',function(){
    var _val = $(this).data('slide');
    $('.slideshow').unslider('animate:' + _val);
    $('.unslider-nav li').removeClass('unslider-active');
    $(this).addClass('unslider-active');
  })
})",View::POS_END,'show');
?>