<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left pull-left">
        <div class="column-img">
          <img src="img/column/column-<?php echo $page->slug?>.png" alt="">
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
    <div class="main-right pull-right">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <div class="postit">
          <p>当前位置：<a href="#">首页</a> > <a href="#">集团概况</a><span></span></p>
        </div>
      </div>
        <div class="content">
          <div class="sub-items">
            <ul>
              <li>
                <a class="sub-item-link clearfix" href="<?php echo Url::to(['site/page','slug'=>'ycjyjt'])?>">
                  <img src="<?php echo Yii::$app->request->baseUrl;?>/img/column/sub-jy.png" alt="" class="pull-left">
                  <div class="sub-item-content">
                    <h4 class="sub-item-title">宜昌交运集团</h4>
                    <p>湖北宜昌交运集团股份有限公司（以下简称公司）是一家国有控股的上市公司，由历史悠久的宜通运输集团和恒通运输公司于1998年8月组建成立；2006年5月实施国有企业改制，2008年6月整体变更为股份公司；2011年11月在深圳证券交易所成功上市（股票代码002627），成为全国道路运输行业第三家上市公司。</p>
                  </div>
                </a>
              </li>
              <li>
                <a class="sub-item-link clearfix" href="#">
                  <img src="<?php echo Yii::$app->request->baseUrl;?>/img/column/sub-jy2.png" alt="" class="pull-left">
                  <div class="sub-item-content">
                    <h4 class="sub-item-title">宜昌公交集团有限责任公司</h4>
                    <p>宜昌公交集团有限责任公司始建于1972年5月，属城市公交国有中型一类客运企业。2001年，由原宜昌市公共汽车总公司更名为宜昌市公共交通总公司。2008年4月，经宜昌市人民政府批准，原宜昌市公共交通总公司与宜昌三峡运输集团有限责任公司组建成立宜昌公交集团有限责任公司。2002年3月前，隶属宜昌市建设部门管理。2002年4月始，隶属宜昌市交通运输局管理。2009年8月，隶属宜昌市国资委管理。2015年1月，宜昌市政府整合湖北宜昌交运集团股份有限公司、宜昌公交集团有限责任公司、宜昌三峡旅游度假区开发有限公司，组建宜昌交通旅游产业发展集团有限公司，划归三峡旅游新区管委会管理。
</p>
                  </div>
                </a>
              </li>
              <li>
                <a class="sub-item-link clearfix" href="#">
                  <img src="<?php echo Yii::$app->request->baseUrl;?>/img/column/sub-jy3.png" alt="" class="pull-left">
                  <div class="sub-item-content">
                    <h4 class="sub-item-title">宜昌三峡旅游度假区开发有限公司</h4>
                    <p>宜昌三峡旅游度假区开发有限公司于2012年11月12日成立，注册资本2亿元，是宜昌交通旅游产业发展集团有限公司下属的全资子公司，经营范围包括旅游景点开发及经营；工艺美术品开发、生产、销售；酒店管理；建筑工程施工；房地产经营、销售等。
</p>
                  </div>
                </a>
              </li>
              <li>
                <a class="sub-item-link clearfix" href="#">
                  <img src="<?php echo Yii::$app->request->baseUrl;?>/img/column/sub-jy4.png" alt="" class="pull-left">
                  <div class="sub-item-content">
                    <h4 class="sub-item-title">宜昌交旅集团汽车租赁有限公司</h4>
                    <p>宜昌交旅集团汽车租赁有限公司（以下简称“公司”）成立于2015年9月28日，位于宜昌高新区发展大道63-4号。公司主打中高端汽车租赁市场，是一家面向社会出行需求，提供汽车长租、短租、个性化定制及驾驶员代驾等业务的服务性公司。</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div><!-- about_info end -->
      </div>
    </div>
  </div>
</div>
