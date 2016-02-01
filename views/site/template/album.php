<?php
/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use app\widgets\Hot;
$this->title = $album->title;
$url = Yii::$app->request->getUrl();
?>
  <div class="container">
    <div class="main">
        <div class="page-header">
          <div class="page-title">
            <h1><?php echo $album->page->name;?></h1>
            <h2><?php echo $album->page->english_name;?></h2>
          </div>
          <?= Breadcrumb::widget();?>
        </div>
        <div class="content">
          <div class="text-center" style="text-align:center;">
          <h3><?php echo $album->title;?></h3>
          <span class="time">
            <?php echo date("Y年m月d日",$album->update_date);?>
          </span>
          </div>
          <div class="brdddd imgcontent">
          <div class="img-main">
               <div class="imgTool">可以使用 ← 左 右→ 键来翻页</div>
               <!--内容展示区域-->
                <div id="imgContent">
                    <a class="imgpn img-prev">上一张</a>
                    <a class="imgpn img-next">下一张</a>
                    <a target="_blank" class="imgpn imgzoom" id="imgzoom">放大</a>
                    <div class="bigImgContent" id="bigImgContent"><a id="aimgcon"><img src="<?= $album->path;?>"/></a></div>
                    <div class="imageDescription"><?= $album->title;?></div>
                 </div>
                <!--缩略图-->
                <div id="smallImgContent">
                  <div class="prevImgAtlas"><?php if($prev_album){?><a href="<?= Url::to(['view-album','id'=>$prev_album->id])?>" target="_self"><img src="<?= $prev_album->path;?>" width="100" height="75" alt="" /><br/>上一图集</a><?php }?></div>
                  <div class="nextImgAtlas"><?php if($next_album){?><a href="<?= Url::to(['view-album','id'=>$next_album->id])?>" target="_self"><img src="<?= $next_album->path;?>" width="100" height="75" alt="" /><br/>下一图集 &gt;</a><?php }?></div>
                  <!--缩略图滚动-->
                 <div class="smallImgTab">
                     <a class="prevPic">上一张</a>
                     <a class="nextPic">下一张</a>
                     <div id="smallImgScroll">
                       <ul class="smallImgList">
                        <?php foreach ($photos as $key => $pic) {?>
                          <li>
                            <div><a href="javascript:void(0)" rel="<?= $pic->path?>" info="<?= $pic->title?>" ><img src="<?= $pic->path?>" width="100" height="75"/></a></div>
                         </li>
                        <?php }?>
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
                <?php if($prev_album){?><a href="<?= Url::to(['view-album','id'=>$prev_album->id])?>" target="_self">
                播放上一图集</a><?php }?>
                <?php if($next_album){?><a href="<?= Url::to(['view-album','id'=>$next_album->id])?>" target="_self">
                播放下一图集</a><?php }else{?>
                <a href="<?= Url::to(['site/page','slug'=>$album->page->slug]);?>" target="_self">返回</a></div>
                <?php }?>
                 <span class="layer-close" title="关闭">×</span>
             </div>
          </div>
      </div>
    <?= Hot::widget();?>
    </div>
  </div>
<?php 
  $this->registerCssFile('@web/js/album/css/gallery.css');//注册自定义js
  $this->registerJsFile('@web/js/album/js/gallery.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>