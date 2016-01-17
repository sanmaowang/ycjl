<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
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
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'user_id',
            'name',
            'slug',
            'url:url',
            'excerpt:ntext',
            'content:ntext',
            'type',
            'status',
            'display_order',
            'create_date',
            'update_date',
        ],
    ]) ?>

</div>
