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
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left">
        <div class="column-img">
          <img src="<?= Yii::$app->request->baseUrl;?>/img/column/column-<?php echo $album->page->slug?>.png" alt="">
        </div>
        <?php if(isset($menu) && count($menu)>0){?>
        <ul>
          <?php foreach ($menu as $key => $m) {
          $current = strpos($url,$m->slug)?"class='current'":'';
          ?>
          <li><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>><?php echo $m->name;?></a></li>
          <?php }?>
        </ul>
        <?php }?>
      </div>
      <div class="main-right">
        <div class="page-header">
          <div class="page-title">
            <h1><?php echo $album->page->name;?></h1>
            <h2><?php echo $album->page->english_name;?></h2>
          </div>
          <?= Breadcrumb::widget();?>
        </div>
        <div class="content">
          <div class="news-main">
            <h3><?php echo $album->title;?></h3>
            <div class="news-image-column">
              <?php
              for($i = 0 ;$i < count($photos); $i++){
                $j = $i + 3;
                if($j%3 == 0){
                  echo '<div class="row">';
                }
                $pic =$photos[$i];
              ?>
              <div class="col-xs-4">
                <a href="<?php echo $pic->path;?>" class="pic-thumbnail swipebox" title="<?php echo $pic->title;?>">
                  <div class="cover">
                    <img src=<?= Yii::$app->request->baseUrl;?><?php echo $pic->path;?> alt="" title="<?php echo $pic->title;?>">
                  </div>
                  <div class="caption">
                    <?php echo $pic->title;?>
                  </div>
                </a>
              </div>
              <?php 
                if(($j+1)%3 == 0){
                echo '</div>';
                }
              }?>
            </div>
            </div>
          </div>
        </div>
        <?= Hot::widget();?>
      </div>
    </div>
  </div>
</div>
<?php 
  $this->registerCssFile('@web/js/swipebox/css/swipebox.css');//注册自定义js
  $this->registerJsFile('@web/js/swipebox/js/jquery.swipebox.js',['depends' => [\yii\web\JqueryAsset::className()]]);
  $this->registerJs("
  $(function(){
    $( '.swipebox' ).swipebox();
  })",View::POS_END,'show');
?>