<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = ' 宜昌交通旅游产业发展集团有限公司 | 首页';
?>
<div class="banner">
  <div class="container">
    <div class="slogan">
      <ul id="sloganlist">
        <li class="imgOn">
          <div class="slogan-1-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-1-1.png" alt=""/>
          </div>
          <div class="slogan-1-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-1-2.png" alt=""/>
          </div>
        </li>
        <li>
          <div class="slogan-4 ">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-4.png" alt=""/>
          </div>
          <!-- <div class="slogan-2-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-2-1.png" alt=""/>
          </div>
          <div class="slogan-2-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-2-2.png" alt=""/>
          </div> -->
        </li>
        <li>
          <div class="slogan-3-left">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-3-a.png" alt=""/>
          </div>
          <div class="slogan-3-right">
            <img src="<?= Yii::$app->request->baseUrl;?>/img/slogan/slogan-3-b.png" alt=""/>
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
            <div class="col-xs-4 quick-link link-focus">
              <a href="<?= Url::to(['site/page','slug'=>'about'])?>"  target="_blank">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-building.png" alt=""/></div>
              企业简介
              </a>
            </div>
            <div class="col-xs-4 quick-link link-group">
              <a href="<?= Url::to(['site/page','slug'=>'struction'])?>"  target="_blank">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-building2.png" alt=""/></div>
              组织架构
              </a>
            </div>
            <div class="col-xs-4 quick-link link-party">
              <a href="<?= Url::to(['site/page','slug'=>'party_construction'])?>"  target="_blank">
              <div class="links-item"><img src="<?= Yii::$app->request->baseUrl;?>/img/icon-cs.png" alt=""/></div>
              党群工作
              </a>
            </div>
          </div>
        </div>
        <div class="column-news">
          <h3 class="column-news-title"><i class="icon-news"></i>最新动态<span>LATEST NEWS</span><a href="<?= Url::to(['site/page','slug'=>'news'])?>" target="_blank" class="more">更多</a></h3>
          <ul class="column-news-list">
            <?php if(isset($news)){
              for($i = 0;$i < count($news); $i++){
                if($news[$i]){
            ?>
            <li><a href="<?= Url::to(['site/view-post','id'=>$news[$i]->id]);?>" target="_blank" title="<?= $news[$i]->name;?>">?= $news[$i]->name;?><?php $days = (strtotime(date("Y-m-d")) -  $news[$i]->update_date)/86400; if($days <= 4){?><img src="<?= Yii::$app->request->baseUrl;?>/img/newest.png" alt=""/><?php } else{ }  ?></a><span><?php echo date("Y.m.d",$news[$i]->update_date);?></span></li>
            <?php }}}?>
          </ul>
        </div>
       
        <div class="column-show">
          <h3 class="column-show-title"><i class="icon-show"></i>图片新闻<span>IMAGE NEWS</span><a href="<?= Url::to(['site/page','slug'=>'picnews'])?>" target="_blank"  class="more">更多</a></h3>
          <div class="column-thumb">
            <?php if(isset($staff)){?>
            <a href="<?= Url::to(['site/page','slug'=>'picnews'])?>" target="_blank"  class="thumb-img"><img src="<?= Yii::$app->request->baseUrl;?><?= $staff->path;?>" alt=""></a>
            <?php }?>
            <!--<div class="column-title"><?php //echo $staff->title;?></div>-->
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php 
$this->registerJsFile('@web/js/jquery.backstretch.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('
  var base_url = "'.Yii::$app->request->baseUrl.'";
  $(function(){
      $("body").backstretch([
          base_url+"/img/home-slider-1.jpg",
          base_url+"/img/home-slider-9.jpg",
          base_url+"/img/home-slider-3.jpg",
        ], {fade:"normal",duration: 8000});
      $(window).on("backstretch.before", function (e, instance, index) {
        $("#sloganlist").find("li").removeClass("imgOn").eq(index).addClass("imgOn");
      });
  })
  ', View::POS_END, 'js-slide'
);
?>
