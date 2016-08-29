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
<div class="banner">
  <div class="container">
    <div class="main clearfix">
      <div class="main-left">
        <div class="column-img">
          <img src="<?= Yii::$app->request->baseUrl;?>/img/column/column-<?php echo $page->slug?>.png" alt="">
        </div>
        <?php if(isset($menu) && count($menu)>0){?>
        <ul>
          <?php $i=0;foreach ($menu as $key => $m) {
            $current = strpos($url,$m->slug)?"class='current'":'';
          ?>
            <li><a <?php if($m->slug=="lxyz")echo "class='lxyz'"?> href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>>
              <?php 
                if($m->slug == 'ycjyjt'){
                 echo "交运集团";
                }else if($m->slug == 'ycgjjt'){
                  echo "公交集团";
                }else if($m->slug == 'ycsxlydjq'){
                  echo "度假区开发公司";
                }else if($m->slug == 'ycqczl'){
                  echo "交旅租车";
                }else if($m->slug == 'xsjt'){
                  echo "交旅行胜";
                }else if($m->slug == 'xyly'){
                  echo "交旅行营";
                }else if($m->slug == 'xylx'){
                  echo "交旅行运";
                }else{ echo $m->name;}?>
            </a></li>
          <?php $i++; }?>
        </ul>
        <?php }?>
      </div>
    <div class="main-right">
      <div class="page-header">
        <div class="page-title">
          <h1><?php echo $page->name;?></h1>
          <h2><?php echo $page->english_name;?></h2>
        </div>
        <?= Breadcrumb::widget();?>
      </div>
      <div id="content" class="content <?php echo $page->slug;?>">
        <?php if($page->id == 6){?>
        <!-- <div id="develop_hype_container" style="position:relative;width:800px;height:680px;overflow:hidden;" aria-live="polite">
          <script type="text/javascript" charset="utf-8" src="<?php echo \Yii::$app->request->baseUrl?>/js/develop.hyperesources/develop_hype_generated_script.js"></script>
        </div> -->
        <link rel="stylesheet" type="text/css" href="css/history.css">
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/history.js"></script>
        <div class="mask"></div>
        <div id="history">

  <div class="title">
    <div id="circle">
      <div class="cmsk"></div>
      <div class="circlecontent">
        <div thisyear="2015" class="timeblock">
          <span class="numf"></span>
          <span class="nums"></span>
          <span class="numt"></span>
          <span class="numfo"></span>
          <div class="clear"></div>
        </div>
        <div class="timeyear">YEAR</div>
      </div>
      <a href="#" class="clock"></a>
    </div>
  </div>
  
  <div id="content1">
    <ul class="list">
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">12月28日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">五峰城际公交正式开通</a></div>
            <div class="hisct">宜昌—五峰城际公交正式开通。此次五峰城际公交的开通，将进一步拉近五峰、宜昌两地的距离，加快城乡客运一体化发展，助推五峰交通实现跨越发展</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">11月12日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">宜昌行胜建设投资有限公司登记成立</a></div>
            <div class="hisct"></div>
          </div>
        </div>
      </li>
      <li style="margin-top:-40px;">
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">9月29日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">宜昌交旅集团汽车租赁有限公司正式挂牌成立</a></div>
            <div class="hisct">宜昌交旅集团汽车租赁有限公司是宜昌交旅集团旗下的全资子公司。公司主打中高端汽车租赁市场，面向社会出行需求，提供汽车长租、短租、个性化定制及驾驶员代驾等服务</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
        
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">7月21日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">交运集团国有股权无偿划转至宜昌交旅集团</a></div>
            <div class="hisct">宜昌市国资委将其持有的交运集团47,604,636股股份（占交运公司总股本的35.66%）无偿划转给宜昌交旅集团，此次股权划转于2015年7月21日完成股份过户登记手续</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">7月15日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">BRT快速公交投入运行</a></div>
            <div class="hisct">宜昌BRT快速公交正式投入运行，成功打造了宜昌最美的城市流动风景线</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">4月28日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">宜长城际公交正式开通</a></div>
            <div class="hisct">宜昌—长阳城际公交正式开通，将工作在宜昌居住在长阳“一小时交通圈”的大城生活模式变为现实</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
        
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">3月28日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">“交运*长江三峡”产品上市</a></div>
            <div class="hisct">“交运*长江三峡”产品首航仪式在“长江三峡8号”游轮上举行</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">3月11日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">公交集团、三峡旅游公司国有股权至宜昌交旅游产业发展集团有限公司</a></div>
            <div class="hisct">根据宜市国资产权[2015]9号文件，市国资委划转公交集团、三峡旅游公司国有股权至宜昌交旅游产业发展集团有限公司</div>
          </div>
        </div>
      </li>
      <li>
        <div class="liwrap">
          <div class="lileft">
            <div class="date">
              <!-- <span class="year">2015年</span> -->
              <span class="md">1月9日</span>
            </div>
          </div>
          
          <div class="point"><b></b></div>
          
          <div class="liright">
            <div class="histt"><a href="#">宜昌交通旅游产业发展集团有限公司成立</a></div>
            <div class="hisct">根据宜昌市政府《市人民政府关于宜昌市级国有投融资公司改革重组方案的批复》文件，宜昌交通旅游产业发展集团有限公司正式成立</div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
        <?php }elseif($page->id == 10){?>
        <ul id="myGallery">
          <?php 
           $path = \Yii::getAlias('@webroot').DIRECTORY_SEPARATOR.'vi-source'.DIRECTORY_SEPARATOR;
           $filesnames = scandir($path);
           foreach ($filesnames as $key => $img) {
            if(strpos($img,'jpg')){
              echo '<li><img src="'.\Yii::$app->request->baseUrl."/vi-source/".$img.'" alt="VI" />';
            }
           }
          ?>
        </ul>
        <?php 
          $this->registerCssFile('@web/js/gallery/css/jquery.galleryview-3.0-dev.css');//注册自定义js
          $this->registerJsFile('@web/js/gallery/js/jquery.timers-1.2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJsFile('@web/js/gallery/js/jquery.easing.1.3.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJsFile('@web/js/gallery/js/jquery.galleryview-3.0-dev.js',['depends' => [\yii\web\JqueryAsset::className()]]);
          $this->registerJs("
          $(function(){
            var _width = parseInt($('.main-right').css('width'))- 20;
            $('#myGallery').galleryView({
              panel_width:_width,
              panel_height:_width*0.71
            });
          })",View::POS_END,'show');
        ?>
        <?php }else{?>
        <?php
        if(isset($page->content) && $page->content !=""){
         echo $page->content;
        }else{?>
          <p><br></p><p class="be-late">内容待更新</p><p><br></p>
        <?php }
        ?>
        <?php }?>
      </div>
      <?= Hot::widget();?>
    </div>
    </div>
  </div>
</div>

