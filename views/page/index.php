<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '内容管理');
$this->params['breadcrumbs'][] = $this->title;

function display_pages($pages){
  foreach ($pages as $key => $page) {
    if(isset($page)){
      echo '<li><div class="row"><div class="col-md-6">';
      if($page->type == 0){
       echo '<span class="label label-success">'.$page->typeLabel.'</span><a href="'.Url::to(['page/view','id'=>$page->id]).'" class="link">'.$page['name'].'</a></div>';
     }else if($page->type == 3){
       echo '<span class="label label-info">'.$page->typeLabel.'</span><a href="'.Url::to(['page/view','id'=>$page->id]).'" class="link">'.$page['name'].'</a></div>';
     }
     else{
       echo '<span class="label label-warning">'.$page->typeLabel.'</span><a href="'.Url::to(['page/view','id'=>$page->id]).'" class="link">'.$page['name'].'</a></div>';
     }
       echo '<div class="col-md-6 text-right">
            <a href="'.Url::to(['page/create','parent_id'=>$page->id]).'">新建子栏目</a>
            <a href="'.Url::to(['page/update','id'=>$page->id]).'">修改本栏目</a>
            <a href="'.Url::to(['page/delete','id'=>$page->id]).'">删除栏目</a>
          </div>
        </div></li>';
    }
    if($page['sub']){
      echo "<ul class='column-list'>";
      display_pages($page['sub']);
      echo "</ul>";
    }
  }
}
?>
<div class="page-index">
  <div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>
  <p>
      <?= Html::a(Yii::t('app', '新建一级栏目'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <ul class="column-list first-level">
  <?php display_pages($pages);?>
  </ul>

</div>
