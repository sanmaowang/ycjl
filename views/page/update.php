<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('app', '更新内容: ', [
    'modelClass' => 'Page',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-update">
	
	<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
	</div>
    <?= $this->render('_form', [
        'model' => $model,
        'parent_id'=>$parent_id
    ]) ?>

</div>
