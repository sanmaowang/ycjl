<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="backup-default-index">
<?php
$this->title = Yii::t('app', '数据备份');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '数据管理', 'items' => [
                    ['label' => '数据备份', 'url' => ['backup/index']],
                ]],
            ];
?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success">
	<?php echo Yii::$app->session->getFlash('success'); ?>
</div>
<?php endif; ?>

<h1>数据备份</h1>
<p>
<a href="<?php echo Url::to(['create'])?>" class="btn btn-primary">创建新的备份</a>
</p>
	<div class="row">
		<div class="col-md-12">
<?php
echo $this->render ( '_list', array (
		'dataProvider' => $dataProvider 
) );
?>
		</div>
	</div>

</div>