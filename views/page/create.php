<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('app', '创建栏目');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '网站栏目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '栏目管理', 'items' => [
                    ['label' => '频道管理', 'url' => ['page/index']],
                ]],
                ['label' => '新闻中心', 'items' => [
                    ['label' => '文章管理', 'url' => ['post/index']],
                    ['label' => '相册管理', 'url' => ['photo/index']],
                ]],
            ];
?>
<div class="page-create">
		<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
		</div>
    <?= $this->render('_form', [
        'model' => $model,
        'pages' => $pages,
        'parent_id'=>$parent_id
    ]) ?>

</div>
