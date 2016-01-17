<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = Yii::t('app', '更新 {modelClass}: ', [
    'modelClass' => '用户',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '用户管理', 'items' => [
                    ['label' => '用户列表', 'url' => ['page/index']],
                ]],
            ];
?>
<div class="admin-update">

    <?php $model->setScenario('update'); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
