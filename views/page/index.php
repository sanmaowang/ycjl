<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '频道管理');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '栏目管理', 'items' => [
                    ['label' => '频道管理', 'url' => ['page/index']],
                    ['label' => '菜单设置', 'url' => ['menu/index']],
                ]],
                ['label' => '新闻中心', 'items' => [
                    ['label' => '文章管理', 'url' => ['post/index']],
                ]],
            ];
function display_pages($pages){
  foreach ($pages as $key => $page) {
    if(isset($page)){
       echo '<li><div class="row"><div class="col-md-6"><span style="margin-left:-10px;">';
       if($page->parent_id == 0){
       echo '<span class="text-muted">['.$page->typeLabel.']</span> '.$page['name'].'</span></div>';
       }else{
       echo '<span class="text-muted">['.$page->typeLabel.']</span> <a href="'.Url::to(['page/view','id'=>$page->id]).'" class="link">'.$page['name'].'</a></span></div>';
       }
       echo '<div class="col-md-6 text-right">';
       if($page->type == 3){
         echo '<a href="'.Url::to(['post/create','page_id'=>$page->id]).'" class="btn btn-success btn-xs">新建内容</a>';
       }else if($page->type == 0){
         echo '<a href="'.Url::to(['page/create','page_id'=>$page->id]).'" class="btn btn-default btn-xs">新建子频道</a>';
       }
       echo '<a href="'.Url::to(['page/update','id'=>$page->id]).'" class="btn btn-primary btn-xs">修改本频道</a>
            <a href="'.Url::to(['page/delete','id'=>$page->id]).'" class="btn btn-danger btn-xs">删除频道</a>
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
  <h2><?= Html::encode($this->title) ?></h2>
  <p>
      <?= Html::a(Yii::t('app', '新建一级频道'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <ul class="column-list first-level">
  <?php display_pages($pages);?>
  </ul>

</div>
