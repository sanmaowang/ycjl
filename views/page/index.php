<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '网站栏目管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
  <div class="page-header">
  <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <p>
      <?= Html::a(Yii::t('app', '新建一级栏目'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <ul class="column-list first-level">
  <?php 
    foreach ($pages as $key => $p) {?>
      <li>
        <div class="row">
          <div class="col-md-6"><?php echo $p->name;?></div>
          <div class="col-md-6 text-right">
            <a href="">新建子栏目</a>
            <a href="">修改本栏目</a>
            <a href="">删除栏目</a>
          </div>
        </div>
      </li>
  <?php  }
  ?>
  <ul class="column-list first-level">
    <li>
      <div class="row">
        <div class="col-md-6">栏目1</div>
        <div class="col-md-6 text-right">
          <a href="">新建子栏目</a>
          <a href="">修改本栏目</a>
          <a href="">删除栏目</a>
        </div>
      </div>
      <ul class="column-list">
        <li>
          <div class="row">
            <div class="col-md-6">栏目1</div>
            <div class="col-md-6 text-right">
              <a href="">新建子栏目</a>
              <a href="">修改本栏目</a>
              <a href="">删除栏目</a>
            </div>
          </div>
          <ul class="column-list">
            <li>
              <div class="row">
                <div class="col-md-6">栏目1</div>
                <div class="col-md-6 text-right">
                  <a href="">新建子栏目</a>
                  <a href="">修改本栏目</a>
                  <a href="">删除栏目</a>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li>
      <div class="row">
        <div class="col-md-6">栏目1</div>
        <div class="col-md-6 text-right">
          <a href="">新建子栏目</a>
          <a href="">修改本栏目</a>
          <a href="">删除栏目</a>
        </div>
      </div>
      <ul class="column-list">
        <li>
          <div class="row">
            <div class="col-md-6">栏目1</div>
            <div class="col-md-6 text-right">
              <a href="">新建子栏目</a>
              <a href="">修改本栏目</a>
              <a href="">删除栏目</a>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-md-6">栏目1</div>
            <div class="col-md-6 text-right">
              <a href="">新建子栏目</a>
              <a href="">修改本栏目</a>
              <a href="">删除栏目</a>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-md-6">栏目1</div>
            <div class="col-md-6 text-right">
              <a href="">新建子栏目</a>
              <a href="">修改本栏目</a>
              <a href="">删除栏目</a>
            </div>
          </div>
        </li>
      </ul>
    </li>
  </ul>

</div>
