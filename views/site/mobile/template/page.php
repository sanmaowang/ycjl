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
    <?= Breadcrumb::widget();?>
      </div>
      <div id="content" class="content <?php echo $page->slug;?>">
        <?php if($page->id == 10){?>


          <?php 
           $path = \Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'vi-source'.DIRECTORY_SEPARATOR;
           $filesnames = scandir($path);
           $arr = [];
           foreach ($filesnames as $key => $img) {
            if(strpos($img,'jpg')){
              array_push($arr,$img);
            }
           }
           $cover = $arr[0];
          ?>
          <!-- <div class="text-center" style="text-align:center;">
            <h3>集团VI</h3>
          </div> -->
            
            <div class="brdddd imgcontent">
            <div class="img-main">
                 <div class="imgTool">可以使用 ← 左 右→ 键来翻页</div>
                 <!--内容展示区域-->
                  <div id="imgContent">
                      <a class="imgpn img-prev">上一张</a>
                      <a class="imgpn img-next">下一张</a>
                      <a target="_blank" class="imgpn imgzoom" id="imgzoom">放大</a>
                      <div class="bigImgContent" id="bigImgContent"><a id="aimgcon">
                        <?php echo '<img src="'.\Yii::$app->request->baseUrl."/vi-source/".$cover.'" />'?>
                      </a></div>
                      <div class="imageDescription">集团VI</div>
                   </div>
                  <!--缩略图-->
                  <div id="smallImgContent">
                   <div class="smallImgTab">
                       <a class="prevPic">上一张</a>
                       <a class="nextPic">下一张</a>
                       <div id="smallImgScroll">
                         <ul class="smallImgList">
                          <?php 
                          foreach ($filesnames as $key => $img) {
                            if(strpos($img,'jpg')){
                              echo '<li><div><a href="javascript:void(0)" rel="'.\Yii::$app->request->baseUrl."/vi-source/".$img.'"><img src="'.\Yii::$app->request->baseUrl."/vi-source/".$img.'" alt="VI" width="100" height="75" /></div></li>';
                            }
                           }
                          ?>
                         </ul>
                       </div>
                    </div>
                  </div>
                  <!--//缩略图-->
                </div>
            </div>
            <div class="popup-layer">
               <div class="popup-layer-rel">
                   <div class="layer-bg"></div>
                   <div class="popup-msg">您已经浏览完所有图片<br />
                  <a href="<?= Url::to(['site/page','slug'=>$page->slug]);?>" target="_self">返回</a></div>
                   <span class="layer-close" title="关闭">×</span>
               </div>
            </div>
          <?php 
            $this->registerCssFile('@web/js/album/css/gallery.css');//注册自定义js
            $this->registerCssFile('@web/js/album/css/gallery.mobile.css');//注册自定义js
            $this->registerJsFile('@web/js/album/js/gallery.vi.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          ?>


        <?php }else{?>
        <?php
        if(isset($page->content) && $page->content !=""){
         echo $page->content;
        }else{?>
          <p><br></p><p class="be-late text-center">内容待更新</p><p><br></p>
        <?php }
        ?>
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

