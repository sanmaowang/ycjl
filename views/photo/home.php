<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = Yii::t('app', '首页最新图片');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '页面管理'), 'url' => ['/page/index']];
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
                    ['label' => '相册管理', 'url' => ['photo/index']],
                ]],
            ];
?>
<div class="photo-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>当前最新新闻图片：</h3>
    <div class="thumbnail" style="width:300px;">
        <?php if($photo){?>
        <img src="<?php echo Yii::$app->request->baseUrl?>/<?php echo $photo->path;?>" width="300"/>
        <?php }else{?>
        <img src="holder.js/300x200" style="height: 200px; width: 100%; display: block;">
        <?php }?>
    </div>
    <div class="photo-index clearfix" style="margin-bottom:40px;">
        <h4>更新图片</h4>
        <?php $form = ActiveForm::begin([
            'options' => [
            'id'=>'post-img',
                'enctype' => 'multipart/form-data'
            ],
        ]) ?>
        
            <?= $form->field($model, 'imageFiles[]')->fileInput(['required'=>'required']) ?>
            <button id="add" class="btn btn-primary">上传</button>
    <?php ActiveForm::end() ?>
    </div>

</div>
<?php
$this->registerJsFile('//cdn.bootcss.com/holder/2.9.1/holder.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>