<?php

/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();

function utf8_strlen($string = null) {
  preg_match_all("/./us", $string, $match);
  return count($match[0]);
}


function cut_str($sourcestr,$cutlength)
{
   $returnstr='';
   $i=0;
   $n=0;
   $org_length = utf8_strlen($sourcestr);//字符串的字节数
   $str_length = strlen($sourcestr);//字符串的字节数
   while (($n<$cutlength) and ($i<=$str_length)){
      $temp_str=substr($sourcestr,$i,1);
      $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
      if ($ascnum>=224)    //如果ASCII位高与224，
      {
         $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符         
         $i=$i+3;            //实际Byte计为3
         $n++;            //字串长度计1
      }
       elseif ($ascnum>=192) //如果ASCII位高与192，
      {
         $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
         $i=$i+2;            //实际Byte计为2
         $n++;            //字串长度计1
      }
       elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
      {
         $returnstr=$returnstr.substr($sourcestr,$i,1);
         $i=$i+1;            //实际的Byte数仍计1个
         $n++;            //但考虑整体美观，大写字母计成一个高位字符
      }else                //其他情况下，包括小写字母和半角标点符号，
      {
         $returnstr=$returnstr.substr($sourcestr,$i,1);
         $i=$i+1;            //实际的Byte数计1个
         $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...
      }
    }
      if ($org_length>$cutlength){
          $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
      }
     return $returnstr;
} 

?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      <div class="news-topic">
        <div class="news-slide">
          <div class="slideshow">
            <ul>
              <?php $j=0; foreach($headlines as $key=>$h){?>
              <?php if($h->thumb){?>
              <li>
                <a href="<?= Url::to(['view-post','id'=>$h->id])?>">
                  <img src="<?php echo $h->thumb;?>" alt="">
                </a>
                <div class="slide-title">
                  <h4><?php echo $h->name;?></h4>
                </div>
                <div class="slide-mask"></div>
              </li>
              <?php 
               $j++;
               if($j>3){ break;}
              }}?>
            </ul>
          </div>
        </div>
        
        <div class="news-topic-main">
          <div class="news-header news-topic-header">
            <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">企业动态</a> <span>ENTERPRISE NEWS</span></h2>
          </div>
          <div class="news-headline">
            <ul class="ulist mix-ulist">
              <?php 
              $i = 0;
              foreach ($group_news as $key => $post) {
                if($post->page_id == 14){
                  if($i == 8){
                    break;
                  }
              ?>
                <li><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo cut_str($post->name,18);?></a> <span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php 
                $i++;
              }}?>
            </ul>
          </div>
        </div>
      </div>
      <div class="pic-topic-main">
        <div class="mod" id="huanqiu">
          <div class="hd line"><h3><a href="<?= Url::to(['site/page','slug'=>'picnews'])?>">图片新闻</a></h3></div>
          <div class="bd">
            <div id="mar" class="image-list">
              <div class="image-list-wrapper">
              <?php 
                $j = 0;
              foreach ($pic_news as $key => $post) {
              ?>
              <div class="image-list-item">
                  <a href="<?= Url::to(['view-post','id'=>$post->id])?>" target="_blank">
                    <img src="<?= $post->thumb;?>">
                  </a>
                  <a href="<?= Url::to(['view-post','id'=>$post->id])?>" class="txt" target="_blank"><?php echo cut_str($post->name,20);?></a>
              </div>
              <?php $j++; if($j == 4){break;} }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
        <div class="col-news-left">
          <div class="news-header" style="padding-right:35px;">
            <h2><a href="<?= Url::to(['site/page','slug'=>'industry_news'])?>">行业资讯</a> <span>INDUSTRY NEWS</span></h2>
          </div>
            <div class="news-list">
            <?php 
              $j = 0;
              foreach ($industry_news as $key => $post) {
                if($post->is_recommend == 0){
                if($post->page_id == 15){
                  if($j == 0){
                    echo "<ul>";
                  }
              ?>
                <li <?php if($j == 0 || $j == 6){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo cut_str($post->name,20);?></a> <span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php 
              if($j == 5){
                echo "</ul><ul>";
              }
              if($j == 11){
                echo "</ul>";
                break;
              }
              $j++;
            }}}?>
          </div>
        </div>
        <div class="col-news-column-right">
          <div class="news-header">
            <h2><a href="<?= Url::to(['site/page','slug'=>'media_focus'])?>">媒体聚焦</a> <span>MEDIA FOCUS</span></h2>
          </div>
          <div class="news-list">
            <?php 
              $j = 0;
              foreach ($media_news as $key => $post) {
                  if($j == 0){
                    echo "<ul>";
                  }
              ?>
                <li <?php if($j == 0 || $j == 6){echo 'class="first"';}?>><a href="<?php echo Url::to(['view-post','id'=>$post->id])?>"><?php echo cut_str($post->name,20);?></a> <span class="time"><?php echo date("Y-m-d",$post->update_date);?></li>
              <?php 
              if($j == 5){
                echo "</ul><ul>";
              }
              if($j == 11){
                echo "</ul>";
                break;
              }
              $j++;
              }?>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
$this->registerCssFile('@web/js/unslider/css/unslider.css');//注册自定义js
$this->registerCssFile('@web/js/unslider/css/unslider-dots.css');//注册自定义js
$this->registerJsFile('@web/js/unslider/js/unslider-min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/marquee.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function(){
  $('.slideshow').unslider({
    speed: 800,       
    delay: 4000,  
    autoplay: true,
    nav: true,
    arrows: false,
  });
  $('#mar').marquee({
    showNum: 10,
  });
  $(document).on('mouseover','.unslider-nav li',function(){
    var _val = $(this).data('slide');
    $('.slideshow').unslider('animate:' + _val);
    $('.unslider-nav li').removeClass('unslider-active');
    $(this).addClass('unslider-active');
  })
})",View::POS_END,'show');
?>