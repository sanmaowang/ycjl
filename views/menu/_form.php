<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
$arr =  explode(',',$model->content);
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
		
		<div class="form-group field-menu-content">
			<label class="control-label" for="menu-content">包含栏目</label>
			<div class="row">
			<?php foreach ($pages as $key => $p) {?>
			<div class="col-md-4">
		  <div class="checkbox">
			  <label>
			    <input type="checkbox" name="Menu[content]" value="<?= $p->id;?>" <?php if(in_array($p->id,$arr)){ echo "checked = 'checked'";}?> >
			    <?= $p->name;?>
			  </label>
			</div>
			</div>
			<?php }?>
			</div>
			<div class="help-block"></div>
		</div>

		
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

