<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '文章管理');
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
?>
<div class="post-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a(Yii::t('app', '创建文章'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'page_id',
            // 'user_id',
            'name:ntext',
            // 'content:ntext',
            'create_date:datetime',
            'update_date:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
