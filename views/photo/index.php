<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '相册管理');
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
<div class="photo-index">
    <div class="row">
        <div class="col-md-2">
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div class="col-md-10 text-right">
            <?php $form = ActiveForm::begin([
                'id' => 'post-form',
                'method'=>'get',
              'options' => ['class' => 'form-inline'],
            ]); ?>
              <div class="form-group">
                <label class="sr-only" for="search">搜索</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="搜索相册" value=""/>
              </div>
              <button type="submit" class="btn btn-default">搜索</button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation" <?php if(!$page_id){?> class="active" <?php }?>><a href="<?php echo Url::to(['photo/index']);?>" style="white-space:nowrap;"><b>全部</b></a></li>
      <?php if(isset($columns)){ foreach ($columns as $key => $col) {?>
      <li role="presentation" <?php if($page_id == $col->id){?> class="active" <?php }?>><a href="<?php echo Url::to(['photo/index','page_id'=>$col->id]);?>" style="white-space:nowrap;"><?= $col->name;?></a></li>
      <?php }}?>  
    </ul>
    <p style="margin:20px 0;">
    <?php if(isset($page_id)){?>
        <?= Html::a(Yii::t('app', '创建相册'), ['create','page_id'=>$page_id], ['class' => 'btn btn-success']) ?>
    <?php }?>
    </p>
    
    <table class="table table-striped">
        <thead>
        <tr>
            <td>#</td>
            <td>相册标题</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($photo as $key => $p) {?>
        <tr>
            <td><?= $key+1?></td>
            <td><b><?= $p->name;?></b></td>
            <td>
                <a href="<?= Url::to(['post/view','id'=>$p->id])?>" class="btn btn-xs btn-primary">查看</a>
                <?= Html::a(Yii::t('app', '修改'), ['post/update', 'id' => $p->id], ['class' => 'btn btn-xs btn-info']) ?>
                <?= Html::a(Yii::t('app', '删除'), ['post/delete', 'id' => $p->id], [
                    'class' => 'btn btn-xs btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', '您确定要删除吗?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </td>
        </tr>
    <?php }?>
    </tbody>
    </table>
    <div class="clearfix">
          <?= LinkPager::widget(['pagination' => $pnation]) ?>  
        </div>
</div>
