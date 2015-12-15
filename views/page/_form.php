<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">
  <?php $form = ActiveForm::begin([
      'id' => 'page-form',
      'options' => ['class' => 'form-horizontal'],
      'fieldConfig' => [
          'template' => "{label}\n<div class=\"col-md-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
          'labelOptions' => ['class' => 'col-md-2 control-label'],
      ],
  ]); ?>
  <?php if(isset($parent_id)){?>
  <div class="form-group field-page-parent_id has-success">
    <label class="col-md-2 control-label" for="page-parent_id">上级栏目</label>
    <div class="col-md-6"><input type="text" id="page-parent_id" class="form-control" name="Page[parent_id]"></div>
    <div class="col-lg-8"><div class="help-block"></div></div>
  </div>
  <?php }else{?>
  <input type="hidden" id="page-parent_id" class="form-control" name="Page[parent_id]" value="0"/>
  <?php }?>
  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

  <div class="form-group field-page-type">
    <label class="col-md-2 control-label" for="page-type">类型</label>
    <div class="col-md-6">
      <select name="Page[type]" class="form-control" id="page-type">
        <option value="0">页面</option>
        <option value="1">站内链接</option>
        <option value="2">站外链接</option>
        <option value="3">新闻中心</option>
      </select>
    </div>
    <div class="col-lg-8"><div class="help-block"></div></div>
  </div>
  <div id="url" style="display:none;">
  <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
  </div>
  <div id="page" style="display:none;">
  <?= $form->field($model, 'excerpt')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
  </div>

  <?= $form->field($model, 'display_order')->textInput() ?>

  <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
  </div>

  <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerJs("
$(function () {
  $('#page-type').on('change',function(e){
    var _val = parseInt($(this).val());
    if(_val == 0){
      $('#page').show();
      $('#url').hide();
    }else if(_val <= 2){
      $('#url').show();
      $('#page').hide();
    }else{
      $('#url').hide();
      $('#page').hide();
    }
  });
  $('#page-type').trigger('change');
});
  ",View::POS_END,'show');
?>
