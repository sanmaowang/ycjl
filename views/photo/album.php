<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '相册管理');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $this->title), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $album->title);
$this->params['menu'] =[
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                // 'Products' menu item will be selected as long as the route is 'product/index'
                ['label' => '栏目管理', 'items' => [
                    ['label' => '频道管理', 'url' => ['page/index']],
                ]],
                ['label' => '新闻中心', 'items' => [
                    ['label' => '文章管理', 'url' => ['post/index']],
                    ['label' => '相册管理', 'url' => ['photo/index']],
                ]],
            ];
?>
<div class="photo-news-content">
    <h2><?php echo $album->title;?></h2>
    <p class="muted">
        <span>创建日期：<?php echo date("Y.m.d",$album->create_date);?></span>
        <span>最后更改日期：<?php echo date("Y.m.d",$album->update_date);?></span>
    </p>
    <p>
        <b>封面图：</b>
        <div class="thumbnail" style="width:300px">
            <?php if($album->path){?>
            <img src="<?php echo Yii::$app->request->baseUrl?><?php echo $album->path;?>" width="300"/>
            <?php }else{?>
            <img src="holder.js/300x180" style="height: 180px; width: 100%; display: block;">
            <?php }?>
        </div>
    </p>
    <p>
        <b>描述信息：</b><br>
        <?= $album->description;?>
    </p>
</div>
<hr>
<div class="panel panel-default" style="width:500px;">
    <div class="panel-heading">
        添加图片
    </div>
<div class="panel-body clearfix">
<?php $form = ActiveForm::begin([
    'options' => [
    'id'=>'post-img',
        'enctype' => 'multipart/form-data'
    ],
]) ?>
<input type="hidden" value="<?php echo $parent_id;?>" name="Photo[parent_id]">
<input type="hidden" value="<?php echo $page_id;?>" name="Photo[page_id]">
<div class="pull-left" style="margin-right:20px;">
<?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true,'required'=>'required']) ?>
</div>
<div class="pull-left">
<button id="add" class="btn btn-default" style="margin-top:20px">上传</button>
</div>
<?php ActiveForm::end() ?>
</div>
</div>
<h4>相册图片：</h4>

    <?php $i=0; foreach ($photos as $key => $p) {
        $j = $i+4;
        if($j%4==0){
            echo '<div class="row">';
        }
    ?>
          <div class="col-xs-6 col-md-3">
            <div class="thumbnail">
                <div class="photo-thumb">
                <?php if($p->path){?>
                <img src="<?php echo Yii::$app->request->baseUrl?><?php echo $p->path;?>" style="height: 180px; width: 100%; display: block;">
                <?php }else{?>
                <img src="holder.js/200x200" style="height: 180px; width: 100%; display: block;">
                <?php }?>
                <div class="mask" style="display:none;">
                    <div class="actions">
                        <?= Html::a(Yii::t('app', '编辑详情'), ['photo/update', 'id' => $p->id], ['class' => 'btn btn-default btn-update ']) ?>
                        <?= Html::a(Yii::t('app', '设为封面'), ['photo/setcover', 'id' => $p->id], [
                        'class' => 'btn btn-info',
                        'data' => [
                            'method' => 'post',
                        ],
                        ]) ?>
                        <?= Html::a(Yii::t('app', '删除照片'), ['photo/delete', 'id' => $p->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', '您确定要删除吗?'),
                        'method' => 'post',
                    ],
                    ]) ?>
                    </div>
                </div>
                </div>
                <div class="caption">
                    <p><?= $p->title;?></p>
                    <div class="edit" style="display:none;">
                        <?php $newform = ActiveForm::begin([
                            'action'=>['photo/update','id'=>$p->id],
                            'options' => [
                                'enctype' => 'multipart/form-data'
                            ],  
                        ]); ?>
                        <?= $newform->field($p, 'title')->textarea(['maxlength' => true,'rows' => 3]) ?>
                        <div class="form-group field-photo-order">
                        <label class="control-label" for="photo-order">顺序</label>
                        <input type="text" id="photo-order" class="form-control" name="Photo[order]" value="<?php if(!$p->order){ echo $i+1;}else{ echo $p->order;}?>">
                        <div class="help-block"></div>
                        </div>
                        <input type="hidden" value="<?php echo $parent_id;?>" name="Photo[parent_id]">
                        <input type="hidden" value="<?php echo $page_id;?>" name="Photo[page_id]">
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', '更新'), ['class' =>'btn btn-success']) ?>
                            <a href="javascript:void(0);" class="btn btn-default btn-cancel">取消</a>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
          </div>
    <?php
        if(($j+1)%4==0){
            echo '</div>';
        }
        $i++;
     }?>
</div>
</div>

<?php 
$this->registerJsFile('//cdn.bootcss.com/holder/2.9.1/holder.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('
  $(function(){
      $(".btn-update").on("click",function(e){
        e.preventDefault();
        $(this).parents(".photo-thumb").siblings(".caption").find(".edit").toggle();
      });
    $(".photo-thumb").on("mouseover",function(e){
        e.preventDefault();
        $(this).find(".mask").show();
    }).on("mouseleave",function(e){
        e.preventDefault();
        $(this).find(".mask").hide();
    });
    $(".btn-cancel").on("click",function(e){
        e.preventDefault();
        $(this).parents(".edit").hide();
    })
    })
  ', View::POS_END, 'js-edit'
);
?>
