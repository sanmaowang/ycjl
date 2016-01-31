<?php
use yii\helpers\Html;
use yii\grid\GridView;

echo GridView::widget([
		'id' => 'install-grid',
		'dataProvider' => $dataProvider,
		'columns' => array(
				'name',
				'size:size',
				'create_time',
				array(
			  'header' => "操作",
			  'class' => 'yii\grid\ActionColumn',
			  'template'=> '{download} {delete}',
			  'headerOptions' => ['width' => '140'],
			  'buttons' => [
			      'download' => function ($url, $model, $key) {
                return Html::a(Html::tag('span', '下载', ['class' => "glyphicon fa fa-eye"]), ['down','id'=>$key], ['class' => "btn btn-xs btn-success", 'title' => '查看']);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a(Html::tag('span', '删除', ['class' => "glyphicon fa fa-eye"]), ['delete','id'=>$key], ['class' => "btn btn-xs btn-danger", 'title' => '删除']);
            },
			  ]
			),
		),
]); ?>


