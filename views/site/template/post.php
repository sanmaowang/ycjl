<?php
/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Breadcrumb;
use app\widgets\Hot;
$this->title = $post->name;
$url = Yii::$app->request->getUrl();

function getExtinfo($str){
  $ext = 'gif|jpg|jpeg|bmp|png';//罗列图片后缀从而实现多扩展名匹配 by http://www.k686.com 绿色软件

  $list = array();  //这里存放结果map
  $c1 = preg_match_all('/<img\s.*?>/', $str, $m1);  //先取出所有img标签文本
  for($i=0; $i<$c1; $i++) { //对所有的img标签进行取属性
    $c2 = preg_match_all('/(\w+)\s*=\s*(?:(?:(["\'])(.*?)(?=\2))|([^\/\s]*))/', $m1[0][$i], $m2); //匹配出所有的属性
    for($j=0; $j<$c2; $j++) { //将匹配完的结果进行结构重组
      $list[$i][$m2[1][$j]] = !empty($m2[4][$j]) ? $m2[4][$j] : $m2[3][$j];
    }
  }
  return $list; //查看结果变量
}

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
          <?php if($post->page->id == 12 || $post->page->id == 39){?>
          <div class="news-main">
            <h3><?php echo $post->name;?></h3>
            <div class="news-image-column">
              <?php
              $pics = getExtinfo($post->content); 
              for($i = 0 ; $i < count($pics);$i++){
                $pic = $pics[$i];
                $j = $i + 3;
                if($j%3 == 0){
                  echo '<div class="row">';
                }
                ?>
                <div class="col-xs-4">
                  <a href=<?php echo $pic['src'];?> class="pic-thumbnail swipebox" title="<?php echo $pic['title']?>">
                    <div class="cover">
                      <img src=<?= Yii::$app->request->baseUrl;?><?php echo $pic['src'];?> alt="" title="<?php echo $pic['title']?>">
                    </div>
                    <div class="caption">
                      <?php echo $pic['title'];?>
                    </div>
                  </a>
                </div>
              <?php
              if(($j+1)%3 == 0){
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
            <?php if($post->subtitle){ ?><h3>——<?php echo $post->subtitle; ?></h3><?php }?>
            <div class="meta">
              <span>发布时间：<?php echo date("Y年m月d日",$post->create_date);?></span><span>来源：<?= $post->source;?></span>
            </div>
          </div>
          <?php echo $post->content;?>
          
          <?php }?>
        </div>
        <?= Hot::widget();?>
      </div>
    </div>
  </div>
</div>
<?php
// $this->registerJsFile('http://v3.jiathis.com/code/jia.js');
?>