<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $post->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
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
        </div>
        <?php echo $post->content;?>
      </div>
      <div class="share">
        <!-- JiaThis Button BEGIN -->
          <div class="jiathis_style">
            <a class="jiathis_button_qzone"></a>
            <a class="jiathis_button_tsina"></a>
            <a class="jiathis_button_tqq"></a>
            <a class="jiathis_button_weixin"></a>
            <a class="jiathis_button_renren"></a>
            <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
            <a class="jiathis_counter_style"></a>
          </div>
        <!-- JiaThis Button END -->
      </div>
      <div class="relate-post">
        <div class="row">
          <div class="col-xs-6">
            <h4>相关新闻</h4>
            <div class="relate-news">
              <div class="news-list">
                <ul>
                  <li><a href="">政企合作再结硕果</a></li>
                  <li><a href="">政企合作再结硕果</a></li>
                  <li><a href="">政企合作再结硕果</a></li>
                  <li><a href="">政企合作再结硕果</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <h4>热点推荐</h4>
            <div class="hot-news">
              <a href="" class="hot-news-title">政企合作再结硕果 集团与远安县政府签订项目合作协议</a>
              <p class="hot-news-content">
                9月25日，远安县人民政府与宜昌城建控股集团投资合作暨远安县2015年第二批招商引资项目签约仪式在远安鸣凤城区举行。...
              </p>
            </div>
          </div>
        </div>
      </div><!-- about_info end -->
    </div>
  </div>
</div>
<?php 
  $this->registerJsFile('http://v3.jiathis.com/code/jia.js');
?>

