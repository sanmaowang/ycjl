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
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left">
        <div class="column-img">
          <img src="<?= Yii::$app->request->baseUrl;?>/img/column/column-<?php echo $post->page->slug?>.png" alt="">
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
            <h1><?php echo $post->page->name;?></h1>
            <h2><?php echo $post->page->english_name;?></h2>
          </div>
          <?= Breadcrumb::widget();?>
        </div>
        <div class="content">
          <div class="content-title">
            <h1><?= $post->name?></h1>
            <?php if($post->subtitle){ ?><h3>——<?php echo $post->subtitle; ?></h3><?php }?>
            <div class="meta">
              <span>发布时间：<?php echo date("Y年m月d日",$post->create_date);?></span><span>来源：<?= $post->source;?></span>
            </div>
          </div>
          <?php echo $post->content;?>
        </div>
        <?= Hot::widget();?>
      </div>
    </div>
  </div>
</div>
<?php
// $this->registerJsFile('http://v3.jiathis.com/code/jia.js');
?>