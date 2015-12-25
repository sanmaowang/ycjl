<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $page->name;
$url = Yii::$app->request->getUrl();
?>
<div class="banner home-bg-news">
  <div class="container">
    <div class="main clearfix">
      <div class="column-tabs">
        <ul>
          <?php if(isset($menu) && count($menu)>0){?>
        <ul>
          <?php foreach ($menu as $key => $m) {
            $current = strpos($url,$m->slug)?"class='current'":'';
          ?>
            <li class="<?php echo $m->slug;?>"><a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>" <?php echo $current?>><?php echo $m->name;?></a></li>
          <?php }?>
        </ul>
        <?php }?>
        </ul>
      </div>
      <div class="column-content-news clearfix">
        <ul>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
          <li>
            <h1>国务院三峡办调研组视察万州大瀑布旅游区</h1>
            <p>2015年4月11日下午，国务院三峡办副主任王伟一行调研组前往万州大瀑布景区考察， 万州区区长白文农等领导陪同，浙江国际旅游集团董事长江焰陪同并汇报工作。 此... <a href="">[查看详情]</a></p>
            <p class="meta">2016-04-30</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
