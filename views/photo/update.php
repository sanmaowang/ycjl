<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = Yii::t('app', '更新{modelClass}: ', [
    'modelClass' => '相册',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '相册管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
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
<div class="photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->render('_form', [
                'model' => $model,
                'page'=>$model->page
            ]) ?>
        </div>
    </div>
</div>
