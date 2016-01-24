<?php 
use yii\web\View;
use yii\helpers\Url;
?>
<div class="navbar-header">
  <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a href="../" class="navbar-brand">宜昌交旅</a>
</div>
<nav id="bs-navbar" class="collapse navbar-collapse">
  <ul class="nav navbar-nav">
    <?php
    if(isset($pages)){
      foreach ($pages as $key => $m) {
        if(isset($current_page)){
          $current_id = ($current_page->parent_id == 0)?$current_page->id:$current_page->parent_id;
        }else{
          $current_id = 1;
        }
    ?>
        <li <?php if($current_id == $m->id){?>active<?php }?>>
          <a href="<?php echo Url::to(['site/page','slug'=>$m->slug])?>"><?= $m->name;?></a>
        </li>
    <?php }}?>
  </ul>
</nav>

