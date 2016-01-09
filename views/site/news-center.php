<?php

/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
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
              <li>
                <a href="#">
                  <img src="img/slide1.jpg" alt="">
                  <div class="slide-title">
                    <h4>我知道我们都没有错</h4>
                    <p>只是放手会比较好过</p>
                  </div>
                </a>
              </li>
              <li><a href="#"><img src="img/slide2.jpg" alt="">
                <div class="slide-title">
                    <h4>只是防守会比较好过</h4>
                    <p>信誓旦旦给了承诺</p>
                  </div></a></li>
              <li><a href="#"><img src="img/slide3.jpg" alt="">
              <div class="slide-title">
                    <h4>却被时间补了空</h4>
                    <p>只是放手会比较好过</p>
                  </div></a></li>
            </ul>
          </div>
        </div>
        <div class="news-topic-main">
          <div class="news-header news-topic-header">
            <h2>集团新闻 <span>GROUP NEWS</span></h2>
          </div>
          <div class="news-headline">
            <ul class="ulist mix-ulist">
              <li><a href="#">[测试]150人联名上书民航局 反对用通航法规来管无人</a></li>
              <li><a href="#">“集结号”吹响 武警南平支队新兵即将奔赴执</a></li>
              <li><a href="#">第三军医大学第二批赴埃塞俄比亚军医专家组出</a></li>
              <li><a href="#">去年民航空难死亡560人：史上最安全</a></li>
              <li><a href="#">徐守盛：坚定支持国防和军队改革 推进军民融</a></li>
              <li><a href="#">云岭双拥：2015回眸 2016-01-08 18:12:33 来</a></li>
              <li><a href="#">印海军造新舰誓言赶超中国 结果一再被这个盟</a></li>
              <li><a href="#">吃蟹赏景更添情趣 阳澄湖年底开通直升机游</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="news-column">
        <div class="news-header">
          <h2>媒体聚焦 <span>MEDIA FOCUS</span></h2>
        </div>
        <div class="col-news-left">
          <div class="news-list">
            <ul>
              <li class="first"><a href="#">国务院深圳滑坡事故调查组:要生动还原...</a> <span class="time">01-01</span></li>
              
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            </ul>
            <ul>
              <li class="first"><a href="#">国务院深圳滑坡事故调查组:要生动还原...</a> <span class="time">01-01</span></li>
              
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
              <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            </ul>
          </div>
        </div>
        <div class="col-news-md">
          <div class="mod">
            <div class="hd"><h3>图片新闻</h3></div>
          </div>
          <div class="imagearea">
            <div class="imagearea-top">
              <div class="image-mask-item">
                <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046989.shtml" target="_blank" class="item-image" mon="ct=0&amp;c=internews&amp;pn=1&amp;a=12" title="仓皇逃跑？猎豹捕食猎物反被“倒追”"><img alt="仓皇逃跑？猎豹捕食猎物反被“倒追”" src="img/东站物流中心.jpg"></a>
                <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046989.shtml" target="_blank" class="item-title" title="仓皇逃跑？猎豹捕食猎物反被“倒追”" mon="ct=0&amp;c=internews&amp;pn=1&amp;a=9">仓皇逃跑？猎豹捕食猎物反被“倒追”</a>
              </div>
            </div>
            <div class="imagearea-bottom">
              <div class="image-list-item">
                <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046977.shtml" title="夏威夷独眼猫成冲浪高手" target="_blank" mon="ct=0&amp;c=internews&amp;pn=2&amp;a=12"><img src="img/东站物流中心.jpg"></a>
                <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046977.shtml" mon="ct=0&amp;c=internews&amp;pn=2&amp;a=9" class="txt" target="_blank">夏威夷独眼猫成冲浪高手</a>
              </div>
              <div class="image-list-item">
                <a href="http://photo.gmw.cn/2016-01/07/content_18395401.htm" title="泰国女子穿婚纱与身亡的男友结婚 " target="_blank" mon="ct=0&amp;c=internews&amp;pn=3&amp;a=12"><img src="img/东站物流中心.jpg"></a>
                <a href="http://photo.gmw.cn/2016-01/07/content_18395401.htm" mon="ct=0&amp;c=internews&amp;pn=3&amp;a=9" class="txt" target="_blank">泰国女子穿婚纱与身亡的男友结婚 </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-news-right">
          <div class="mod" id="huanqiu">
            <div class="hd line"><h3>环球视野</h3></div>
            <div class="bd">
              <div class="image-list">
                <div class="image-list-wrapper">
                  <div class="image-list-item">
                    <a href="http://cnews.chinadaily.com.cn/2016-01/07/content_22982037.htm" title="德国科隆大规模性侵案：警方确定3名嫌疑人" target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=1"><img src="img/东站物流中心.jpg"></a><a href="http://cnews.chinadaily.com.cn/2016-01/07/content_22982037.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=1" class="txt" target="_blank">德国科隆大规模性侵案：警方确定3名嫌疑人</a>
                  </div>
                  <div class="image-list-item">
                    <a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" title="意大利一变性男子整形成瘾 与妻子似姐妹 " target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2"><img src="img/东站物流中心.jpg"></a><a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2" class="txt" target="_blank">意大利一变性男子整形成瘾 与妻子似姐妹 </a>
                  </div>
                  <div class="image-list-item" style="margin-right:0;">
                    <a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" title="意大利一变性男子整形成瘾 与妻子似姐妹 " target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2"><img src="img/东站物流中心.jpg"></a><a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2" class="txt" target="_blank">意大利一变性男子整形成瘾 与妻子似姐妹 </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mod tbox" id="internal-hotword">
            <div class="hd"><h3>国际热搜词</h3></div>
            <div class="bd">
              <ol class="olist " id="">
                <li><span class="listnum num1"></span><a href="http://news.youth.cn/gn/201601/t20160108_7503581.htm" target="_blank" title="银川公交车纵火案17位遇难者名单公布" mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=1">银川公交车纵火案17位遇难者名单公布</a></li>
                <li><span class="listnum num2"></span><a href="http://legal.gmw.cn/2016-01/07/content_18397924.htm" target="_blank" title="系统显示女子10岁生过孩子 计生部门神回复 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=2">系统显示女子10岁生过孩子 计生部门神回复 </a></li>
                <li><span class="listnum num3"></span><a href="http://politics.gmw.cn/2016-01/08/content_18411370.htm" target="_blank" title="天价彩礼：部分农村婚嫁成本费起步价30万元 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=3">天价彩礼：部分农村婚嫁成本费起步价30万元 </a></li>
                <li><span class="listnum num4"></span><a href="http://news.youth.cn/gn/201601/t20160108_7503006.htm" target="_blank" title="中纪委机关报：石油帮、秘书帮、山西帮已分崩离析" mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=4">中纪委机关报：石油帮、秘书帮、山西帮已分崩离析</a></li>
                <li><span class="listnum num5"></span><a href="http://legal.gmw.cn/2016-01/07/content_18404309.htm" target="_blank" title="甘肃一县官落马牵出百人:我张口下面没人敢说话 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=5">甘肃一县官落马牵出百人:我张口下面没人敢说话 </a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    <div class="news-column">
      <div class="news-header">
        <h2>媒体聚焦 <span>MEDIA FOCUS</span></h2>
      </div>
      <div class="col-news-left">
        <div class="news-list">
          <ul>
            <li class="first"><a href="#">国务院深圳滑坡事故调查组:要生动还原...</a> <span class="time">01-01</span></li>
            
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
          </ul>
          <ul>
            <li class="first"><a href="#">国务院深圳滑坡事故调查组:要生动还原...</a> <span class="time">01-01</span></li>
            
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
            <li><a href="#">国务院深圳滑坡事故调查组:要生动还原事故经过...</a> <span class="time">01-01</span></li>
          </ul>
        </div>
      </div>
      <div class="col-news-md">
        <div class="mod">
          <div class="hd"><h3>图片新闻</h3></div>
        </div>
        <div class="imagearea">
          <div class="imagearea-top">
            <div class="image-mask-item">
              <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046989.shtml" target="_blank" class="item-image" mon="ct=0&amp;c=internews&amp;pn=1&amp;a=12" title="仓皇逃跑？猎豹捕食猎物反被“倒追”"><img alt="仓皇逃跑？猎豹捕食猎物反被“倒追”" src="img/东站物流中心.jpg"></a>
              <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046989.shtml" target="_blank" class="item-title" title="仓皇逃跑？猎豹捕食猎物反被“倒追”" mon="ct=0&amp;c=internews&amp;pn=1&amp;a=9">仓皇逃跑？猎豹捕食猎物反被“倒追”</a>
            </div>
          </div>
          <div class="imagearea-bottom">
            <div class="image-list-item">
              <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046977.shtml" title="夏威夷独眼猫成冲浪高手" target="_blank" mon="ct=0&amp;c=internews&amp;pn=2&amp;a=12"><img src="img/东站物流中心.jpg"></a>
              <a href="http://photo.cankaoxiaoxi.com/roll10/2016/0107/1046977.shtml" mon="ct=0&amp;c=internews&amp;pn=2&amp;a=9" class="txt" target="_blank">夏威夷独眼猫成冲浪高手</a>
            </div>
            <div class="image-list-item">
              <a href="http://photo.gmw.cn/2016-01/07/content_18395401.htm" title="泰国女子穿婚纱与身亡的男友结婚 " target="_blank" mon="ct=0&amp;c=internews&amp;pn=3&amp;a=12"><img src="img/东站物流中心.jpg"></a>
              <a href="http://photo.gmw.cn/2016-01/07/content_18395401.htm" mon="ct=0&amp;c=internews&amp;pn=3&amp;a=9" class="txt" target="_blank">泰国女子穿婚纱与身亡的男友结婚 </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-news-right">
        <div class="mod" id="huanqiu">
          <div class="hd line"><h3>环球视野</h3></div>
          <div class="bd">
            <div class="image-list">
              <div class="image-list-wrapper">
                <div class="image-list-item">
                  <a href="http://cnews.chinadaily.com.cn/2016-01/07/content_22982037.htm" title="德国科隆大规模性侵案：警方确定3名嫌疑人" target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=1"><img src="img/东站物流中心.jpg"></a><a href="http://cnews.chinadaily.com.cn/2016-01/07/content_22982037.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=1" class="txt" target="_blank">德国科隆大规模性侵案：警方确定3名嫌疑人</a>
                </div>
                <div class="image-list-item">
                  <a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" title="意大利一变性男子整形成瘾 与妻子似姐妹 " target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2"><img src="img/东站物流中心.jpg"></a><a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2" class="txt" target="_blank">意大利一变性男子整形成瘾 与妻子似姐妹 </a>
                </div>
                <div class="image-list-item" style="margin-right:0;">
                  <a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" title="意大利一变性男子整形成瘾 与妻子似姐妹 " target="_blank" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2"><img src="img/东站物流中心.jpg"></a><a href="http://photo.gmw.cn/2016-01/07/content_18395635.htm" mon="ct=0&amp;a=27&amp;c=internews&amp;pn=2" class="txt" target="_blank">意大利一变性男子整形成瘾 与妻子似姐妹 </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mod tbox" id="internal-hotword">
          <div class="hd"><h3>国际热搜词</h3></div>
          <div class="bd">
            <ol class="olist " id="">
              <li><span class="listnum num1"></span><a href="http://news.youth.cn/gn/201601/t20160108_7503581.htm" target="_blank" title="银川公交车纵火案17位遇难者名单公布" mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=1">银川公交车纵火案17位遇难者名单公布</a></li>
              <li><span class="listnum num2"></span><a href="http://legal.gmw.cn/2016-01/07/content_18397924.htm" target="_blank" title="系统显示女子10岁生过孩子 计生部门神回复 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=2">系统显示女子10岁生过孩子 计生部门神回复 </a></li>
              <li><span class="listnum num3"></span><a href="http://politics.gmw.cn/2016-01/08/content_18411370.htm" target="_blank" title="天价彩礼：部分农村婚嫁成本费起步价30万元 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=3">天价彩礼：部分农村婚嫁成本费起步价30万元 </a></li>
              <li><span class="listnum num4"></span><a href="http://news.youth.cn/gn/201601/t20160108_7503006.htm" target="_blank" title="中纪委机关报：石油帮、秘书帮、山西帮已分崩离析" mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=4">中纪委机关报：石油帮、秘书帮、山西帮已分崩离析</a></li>
              <li><span class="listnum num5"></span><a href="http://legal.gmw.cn/2016-01/07/content_18404309.htm" target="_blank" title="甘肃一县官落马牵出百人:我张口下面没人敢说话 " mon="c=civilnews&amp;ct=0&amp;a=27&amp;col=8&amp;pn=5">甘肃一县官落马牵出百人:我张口下面没人敢说话 </a></li>
            </ol>
          </div>
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
$this->registerJs("
$(function(){
  $('.slideshow').unslider({
    autoplay: true,
    arrows: false
  });
})",View::POS_END,'show');
?>