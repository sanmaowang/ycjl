<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '数据导出');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '数据管理', 'items' => [
                    ['label' => '数据导出', 'url' => ['admin/backup']],
                    ['label' => '数据导入', 'url' => ['admin/restore']],
                ]],
            ];
?>
<div class="menu-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a(Yii::t('app', '导出'), ['backup'], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => Yii::t('app', '您确定要导出数据库吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
