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
<div class="container">
    <div class="page-header">
      <div class="page-title">
        <h1><?php echo $page->name;?></h1>
        <h2><?php echo $page->english_name;?></h2>
      </div>
      <?= Breadcrumb::widget();?>
    </div>
    <div id="content" class="content <?php echo $page->slug;?>">
      <?php echo $page->content;?>
    </div>
</div>

