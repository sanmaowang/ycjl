<?php
/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use app\widgets\Hot;
$this->title = $post->name;
$url = Yii::$app->request->getUrl();
?>
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h1><?php echo $post->page->name;?></h1>
        <h2><?php echo $post->page->english_name;?></h2>
      </div>
      <?= Breadcrumb::widget();?>
    </div>
    <div class="content">
      <?php if($post->page->id == 12){?>
      <div class="news-main">
        <h3><?php echo $post->name;?></h3>
        <div class="news-image-column">
          <?php
          preg_match_all("|src=(.*) |U", $post->content, $result);
          $pics = $result[1];
           foreach ($pics as $key => $pic) {
            $pic = str_replace('"', '', $pic);
            $i = $key + 3;
            if($i%3 == 0){
              echo '<div class="row">';
            }
            ?>
            <div class="col-xs-4">
              <a href=<?php echo $pic;?> class="pic-thumbnail swipebox">
                <div class="cover"><img src=<?= Yii::$app->request->baseUrl;?><?php echo $pic;?> alt=""></div>
              </a>
            </div>
          <?php
          if(($i+1)%3 == 0){
            echo '</div>';
          }
           }?>
          <?php 
            $this->registerCssFile('@web/js/swipebox/css/swipebox.css');//注册自定义js
            $this->registerJsFile('@web/js/swipebox/js/jquery.swipebox.js',['depends' => [\yii\web\JqueryAsset::className()]]);
            $this->registerJs("
            $(function(){
              $( '.swipebox' ).swipebox();
            })",View::POS_END,'show');
          ?>
        </div>
        </div>
      </div>
      <?php }else{?>
      <div class="content-title">
        <h1><?= $post->name?></h1>
        <div class="meta">
          <span>发布时间：<?php echo date("Y年m月d日",$post->create_date);?></span><span>来源：<?= $post->source;?></span>
        </div>
      </div>
      <?php echo $post->content;?>
      
      <?php }?>
    <?php
    $this->registerJs("
            $(function(){
              var width = $('.content img').width();
              $('.content img').height(width*3/4.2);
            })",View::POS_END,'show');
    ?>
</div>
