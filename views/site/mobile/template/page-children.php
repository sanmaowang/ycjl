<?php

/* @var $this yii\web\View */

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
      <div class="content">
        <?php echo $page->content;?>
      </div><!-- about_info end -->
    </div>
  </div>
</div>
