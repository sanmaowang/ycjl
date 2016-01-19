<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = '宜昌交旅 | 首页';
?>
<div class="banner">
  <div class="container">
    <div class="slogan">
      <ul id="sloganlist">
        <li class="imgOn">
          <div class="slogan-1-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-1-1.png" alt=""/>
          </div>
          <div class="slogan-1-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-1-2.png" alt=""/>
          </div>
        </li>
        <li>
          <div class="slogan-2-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-2-1.png" alt=""/>
          </div>
          <div class="slogan-2-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-2-2.png" alt=""/>
          </div>
        </li>
        <li>
          <div class="slogan-3-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-3-1.png" alt=""/>
          </div>
          <div class="slogan-3-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan-3-2.png" alt=""/>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="columns">
    <div class="container">
      <div class="row">
        <div class="column-links">
          <h3 class="column-links-title"><i class="icon-link"></i>快速链接<span>QUICK LINKS</span>
          </h3>
          <div class="row">
            <div class="col-xs-4">
              <a href="<?= Url::to(['site/page','slug'=>'media-focus'])?>">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-newspaper.png" alt=""/></div>
              媒体聚焦
              </a>
            </div>
            <div class="col-xs-4">
              <a href="<?= Url::to(['site/page','slug'=>'about'])?>">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-building.png" alt=""/></div>
              集团简介
              </a>
            </div>
            <div class="col-xs-4">
              <a href="<?= Url::to(['site/page','slug'=>'party-construction'])?>">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-cs.png" alt=""/></div>
              党群工作
              </a>
            </div>
          </div>
        </div>
        <div class="column-news">
          <h3 class="column-news-title"><i class="icon-news"></i>集团新闻<span>GROUP NEWS</span><a href="<?= Url::to(['site/page','slug'=>'group-news'])?>" target="_blank" class="more">更多</a></h3>
          <ul class="column-news-list">
            <?php if(isset($news)){
              for($i = 0;$i < 4; $i++){?>
            <li><a href="<?= Url::to(['site/view-post','id'=>$news[$i]->id]);?>"><?= $news[$i]->name;?></a><span><?php echo date("Y.m.d",$news[$i]->update_date);?></span></li>
            <?php }}?>
          </ul>
        </div>
       
        <div class="column-show">
          <h3 class="column-show-title"><i class="icon-show"></i>员工风采<span>STAFF STYLE</span><a href="<?= Url::to(['site/page','slug'=>'staff'])?>" target="_blank"  class="more">更多</a></h3>
          <div class="column-thumb">
            <a href="<?= Url::to(['site/view-post','id'=>$staff->id]);?>" class="thumb-img"><img src="<?= Yii::$app->request->baseUrl;?><?= $staff->thumb;?>" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
$this->registerJsFile('@web/js/jquery.backstretch.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('
  var base_url = "'.Yii::$app->request->baseUrl.'";
  $(function(){
      $("body").backstretch([
          base_url+"/img/home-slider-1.jpg",
          base_url+"/img/home-slider-7.jpg",
          base_url+"/img/home-slider-8.jpg",
        ], {fade:"normal",duration: 8000});
      $(window).on("backstretch.before", function (e, instance, index) {
        // Do something
        $("#sloganlist").find("li").removeClass("imgOn").eq(index).addClass("imgOn");
      });
  })
  ', View::POS_END, 'js-slide'
  );
?>
