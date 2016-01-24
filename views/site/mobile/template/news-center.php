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
  <div class="container">
    <div class="page-header">
      <div class="page-title">
        <h1><?php echo $page->name;?></h1>
        <h2><?php echo $page->english_name;?></h2>
      </div>
    </div>
    <div class="news-slide">
      <div class="slideshow">
        <ul>
          <?php $j=0; foreach($headlines as $key=>$h){?>
          <?php if($h->thumb){?>
          <li>
            <a href="<?= Url::to(['view-post','id'=>$h->id])?>" class="slide-pic">
              <img src="<?php echo $h->thumb;?>" alt="">
              <div class="slide-title">
                <div class="row">
                  <div class="container">
                    <h4><?php echo cut_str($h->name,20);?></h4>
                    <p><?php echo $h->shortintro;?></p>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <?php 
           $j++;
           if($j>3){ break;}
          }}?>
        </ul>
      </div>
    </div>
    <div class="news-header" style="margin-top:0;">
      <h2><a href="<?= Url::to(['site/page','slug'=>'group_news'])?>">企业动态</a> <span>ENTERPRISE NEWS</span></h2>
    </div>
    <ul class="media-list news-list">
      <?php 
      $i = 0;
      foreach ($group_news as $key => $post) {
        if($post->page_id == 14){
          if($i == 4){
            break;
          }
      ?>
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <?php echo $post->shortintro;?>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
      <?php 
        $i++;
      }}?>
    </ul>
    <div class="news-header">
      <h2><a href="<?= Url::to(['site/page','slug'=>'industry_news'])?>">行业资讯</a> <span>INDUSTRY NEWS</span></h2>
    </div>
    <ul class="media-list news-list">
      <?php 
      $i = 0;
      foreach ($industry_news as $key => $post) {
        if($i == 4){
          break;
        }
      ?>
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <?php echo $post->shortintro;?>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
      <?php 
        $i++;
      }?>
    </ul>
    <div class="news-header">
      <h2><a href="<?= Url::to(['site/page','slug'=>'media_focus'])?>">媒体聚焦</a> <span>MEDIA FOCUS</span></h2>
    </div>
    <ul class="media-list news-list">
      <?php 
      $i = 0;
      foreach ($media_news as $key => $post) {
          if($i == 4){
            break;
          }
      ?>
      <li class="media">
        <a href="<?php echo Url::to(['view-post','id'=>$post->id])?>">
        <div class="media-body">
          <h4 class="media-heading"><?php echo $post->name;?></h4>
          <?php echo $post->shortintro;?>
          <div class="time"><?php echo date("Y-m-d",$post->update_date);?></div>
        </div>
        <div class="media-right">
          <?php if($post->thumb){?>
            <img class="media-object" src="<?= $post->thumb;?>" alt="<?= $post->name;?>" width="64" height="64">
          <?php }?>
        </div>
        </a>
      </li>
      <?php 
        $i++;
      }?>
    </ul>
</div>
<?php 
$this->registerCssFile('@web/js/unslider/css/unslider.css');//注册自定义js
$this->registerCssFile('@web/js/unslider/css/unslider-dots.css');//注册自定义js
$this->registerJsFile('@web/js/unslider/js/unslider-min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function(){
  $('.slideshow').unslider({
    speed: 800,       
    delay: 4000,  
    autoplay: true,
    arrows: false,

  });
})",View::POS_END,'show');
?>