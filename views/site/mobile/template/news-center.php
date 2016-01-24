<?php

/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
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
                <a href="<?= Url::to(['view-post','id'=>$h->id])?>">
                  <img src="<?php echo $h->thumb;?>" alt="">
                  <div class="slide-title">
                    <h4><?php echo $h->name;?></h4>
                    <p><?php echo $h->shortexcerpt;?></p>
                  </div>
                  <div class="slide-mask"></div>
                </a>
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
            <h2>企业动态 <span>ENTERPRISE NEWS</span></h2>
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
                <li><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo $post->name;?></a> <span class="time"><?php echo date("m-d",$post->update_date);?></li>
              <?php 
                $i++;
              }}?>
            </ul>
          </div>
        </div>
      </div>
      <div class="clearfix">
        <div class="col-news-left">
          <div class="news-header" style="padding-right:35px;">
            <h2>行业资讯 <span>INDUSTRY NEWS</span></h2>
          </div>
            <div class="news-list">
            <?php 
              $j = 0;
              foreach ($industry_news as $key => $post) {
                if($post->is_recommend == 0){
                if($post->page_id == 15){
                  if($j == 0){
                    echo "<ul>";
                  }
              ?>
                <li <?php if($j == 0 || $j == 6){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo $post->name;?></a> <span class="time"><?php echo date("m-d",$post->update_date);?></li>
              <?php 
              if($j == 5){
                echo "</ul><ul>";
              }
              if($j == 11){
                echo "</ul>";
                break;
              }
              $j++;
            }}}?>
          </div>
        </div>
        <div class="col-news-column-right">
          <div class="news-header">
            <h2>媒体聚焦 <span>MEDIA FOCUS</span></h2>
          </div>
          <div class="news-list">
            <?php 
              $j = 0;
              foreach ($media_news as $key => $post) {
                  if($j == 0){
                    echo "<ul>";
                  }
              ?>
                <li <?php if($j == 0 || $j == 6){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo $post->name;?></a> <span class="time"><?php echo date("m-d",$post->update_date);?></li>
              <?php 
              if($j == 5){
                echo "</ul>";
                break;
              }
              $j++;
              }?>
          </div>
          <div class="mod" id="huanqiu">
            <div class="hd line"><h3>图片新闻</h3></div>
            <div class="bd">
              <div class="image-list">
                <div class="image-list-wrapper">
                <?php 
                  $j = 0;
                foreach ($pic_news as $key => $post) {
                ?>
                <div class="image-list-item">
                    <a href="<?= Url::to(['view-post','id'=>$post->id])?>" title="<?= $post->name;?>" target="_blank"><img src="<?= $post->thumb;?>"></a><a href="<?= Url::to(['view-post','id'=>$post->id])?>" class="txt" target="_blank"><?= $post->name;?></a>
                  </div>
                <?php $j++; if($j == 4){break;} }?>
                </div>
              </div>
            </div>
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
$this->registerJs("
$(function(){
  $('.slideshow').unslider({
    speed: 800,       
    delay: 4000,  
    autoplay: true,
    arrows: false,

  });
})",View::POS_END,'show');
?>