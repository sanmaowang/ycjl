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
            <li><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>>
              <?php 
                if($m->slug == 'ycjyjt'){
                 echo "交运集团";
                }else if($m->slug == 'ycgjjt'){
                  echo "公交集团";
                }else if($m->slug == 'ycsxlydjq'){
                  echo "度假区开发公司";
                }else if($m->slug == 'ycqczl'){
                  echo "汽车租赁公司";
                }else if($m->slug == 'xsjt'){
                  echo "行胜建投";
                }else{ echo $m->name;}?>
            </a></li>
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
        <?php if($page->id == 6){?>
        <div id="develop_hype_container" style="position:relative;width:680px;height:600px;overflow:hidden;" aria-live="polite">
          <script type="text/javascript" charset="utf-8" src="<?php echo \Yii::$app->request->baseUrl?>/js/develop.hyperesources/develop_hype_generated_script.js"></script>
        </div>
        <?php }elseif($page->id == 10){?>
        <ul id="myGallery">
          <?php 
           $path = \Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'vi-source'.DIRECTORY_SEPARATOR;
           $filesnames = scandir($path);
           foreach ($filesnames as $key => $img) {
            if(strpos($img,'jpg')){
              echo '<li><img src="'.\Yii::$app->request->baseUrl."/vi-source/".$img.'" alt="VI" />';
            }
           }
          ?>
        </ul>
        <?php 
          $this->registerCssFile('@web/js/gallery/css/jquery.galleryview-3.0-dev.css');//注册自定义js
          $this->registerJsFile('@web/js/gallery/js/jquery.timers-1.2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJsFile('@web/js/gallery/js/jquery.easing.1.3.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJsFile('@web/js/gallery/js/jquery.galleryview-3.0-dev.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJs("
          $(function(){
            var _width = parseInt($('.main-right').css('width'))- 20;
            $('#myGallery').galleryView({
              panel_width:_width,
              panel_height:_width*0.71
            });
          })",View::POS_END,'show');
        ?>
        <?php }else{?>
        <?php echo $page->content;?>
        <?php }?>
      </div>
      <?= Hot::widget();?>
    </div>
    </div>
  </div>
</div>

