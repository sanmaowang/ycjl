<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin([
    	'id' => 'post-form',
      'options' => ['class' => 'form-horizontal'],
      'fieldConfig' => [
          'template' => "{label}\n<div class=\"col-md-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
          'labelOptions' => ['class' => 'col-md-2 control-label'],
      ]
    ]); ?>

    <div class="form-group field-page-id">
      <label class="col-md-2 control-label" for="post-content">所属频道</label>
      <div class="col-md-2">
        <select id="post-page_id" name="Post[page_id]" class="form-control">
          <?php foreach ($pages as $key => $page) {
            if($page->type == 3){
            echo '<option value="'.$page->id.'">'.$page->name.'</option>';
          }}?>
          
        </select>
      </div>
      <div class="col-lg-8"><div class="help-block"></div></div>
    </div>

    <?= $form->field($model, 'name')->textInput() ?>

    <div class="form-group field-post-content">
	    <label class="col-md-2 control-label" for="post-content">内容</label>
	    <div class="col-md-8">
	      <script id="post-content" name="Post[content]" type="text/plain"><?php echo $model->content;?></script>
	    </div>
	    <div class="col-lg-8"><div class="help-block"></div></div>
	  </div>
    <?php echo $form->field($model, 'is_recommend')->radioList(['1'=>'是','0'=>'否']) ?>
    <?php echo $form->field($model, 'is_headline')->radioList(['1'=>'是','0'=>'否']) ?>

    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 

$this->registerJsFile('@web/js/ueditor/ueditor.config.js');//注册自定义js
$this->registerJsFile('@web/js/ueditor/ueditor.all.min.js');
$this->registerJsFile('@web/js/ueditor/lang/zh-cn/zh-cn.js');

$this->registerJs("
$(function () {
  var editor = UE.getEditor('post-content');
});
  ",View::POS_END,'show');
?>
