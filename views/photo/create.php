<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = Yii::t('app', '创建图片新闻');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '相册管理'), 'url' => ['index']];
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
    <div class="row">
        <div class="col-lg-8">
            <div class="photo-form">
                <?php $form = ActiveForm::begin([
                    'id' => 'post-form',
                    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                          'template' => "{label}\n<div class=\"col-md-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                          'labelOptions' => ['class' => 'col-md-2 control-label'],
                      ]
                ]); ?>
                <div class="form-group field-photo-page_id">
                  <label class="col-md-2 control-label" for="photo-create_date">所属分类</label>
                  <div class="col-md-6">
                    <input type="text" id="photo-page_id" class="form-control" value="<?php echo $page->name;?>" readonly>
                 </div>
                  <div class="col-lg-8"><div class="help-block"></div></div>
                </div>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <div class="form-group field-photo-create_date">
                  <label class="col-md-2 control-label" for="photo-create_date">发布时间</label>
                  <div class="col-md-6"><input type="text" id="photo-create_date" class="form-control datetime" name="Photo[create_date]" value="<?php echo date("Y-m-d",$model->create_date);?>"></div>
                  <div class="col-lg-8"><div class="help-block"></div></div>
                </div>

                <div class="form-group field-photo-update_date">
                  <label class="col-md-2 control-label" for="photo-update_date">最后修改时间</label>
                  <div class="col-md-6"><input type="text" id="photo-update_date" class="form-control datetime" name="Photo[update_date]" value="<?php echo date("Y-m-d",$model->update_date);?>"></div>
                  <div class="col-lg-8"><div class="help-block"></div></div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-2">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

<?php 

$this->registerCssFile('@web/js/datetimepicker/css/bootstrap-datetimepicker.css');//注册自定义js
$this->registerJsFile('@web/js/datetimepicker/js/bootstrap-datetimepicker.js',['depends' => [\yii\web\JqueryAsset::className()]]);//注册自定义js
$this->registerJsFile('@web/js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js',['depends' => [\yii\web\JqueryAsset::className()]]);//注册自定义js

$this->registerJs("
$(function () {
  $('.datetime').datetimepicker({
    autoclose:true,
    language:'zh-CN',
    minView:2,
    format: 'yyyy-mm-dd',
    todayHighlight:true,
    todayBtn:true,
  });
});
  ",View::POS_END,'show');
?>
