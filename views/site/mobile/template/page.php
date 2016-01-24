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
<div class="container">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
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
  <?php if(isset($menu) && count($menu)>0){?>
    <div class="menu">
      <p>导航：</p>
    <ul class="nav nav-pills nav-justified">
      <?php foreach ($menu as $key => $m) {
      $current = strpos($url,$m->slug)?"class='active'":'';
      ?>
      <li role="presentation" <?php echo $current?>><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>"><?php echo $m->name;?></a></li>
      <?php }?>
    </ul>
    </div>
  <?php }?>
</div>

