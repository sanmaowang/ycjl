<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '用户管理');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '用户管理', 'items' => [
                    ['label' => '用户列表', 'url' => ['page/index']],
                ]],
            ];
?>
<div class="admin-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Admin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        
        <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            'name',
            'english_name',
            'email',
            'role',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
    </div>

</div>
