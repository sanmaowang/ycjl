<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('app', '创建栏目');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '网站栏目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">
		<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
		</div>
    <?= $this->render('_form', [
        'model' => $model,
        'parent_id'=>$parent_id
    ]) ?>

</div>
