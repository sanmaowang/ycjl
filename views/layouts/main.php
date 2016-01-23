<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\Menu;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">交旅集团网站后台管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
             $a = 0;
             if(strpos(\Yii::$app->request->url,'user')){ $a = 1;}?>
            <li <?php if($a == 0){?>class="active"<?php }?>><a href="<?= Url::to(['page/index'])?>">内容管理</a></li>
            <li <?php if($a == 1){?>class="active"<?php }?>><a href="<?= Url::to(['user/index'])?>">用户管理</a></li>
          </ul>
          <div class="navbar-nav navbar-right nav">
            <li>
            <?php if(Yii::$app->user->isGuest){?>
            <a href="<?= Url::to(['admin/login'])?>" data-method="post">登录</a></li>
            <?php }else{?>
            <a href="<?= Url::to(['admin/logout'])?>" data-method="post"><?php echo '登出 (' . Yii::$app->user->identity->username . ')';?></a>
            <?php }?>
            </li>
          </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="main">
  <div class="container-fluid">
    <div class="col-md-2">
        <?php 
        echo Menu::widget([
            'options'=>['class'=>'nav nav-sidebar menu-custom'],
            'items' => isset($this->params['menu']) ? $this->params['menu'] : [],
        ]);
      ?>
    </div>
    <div class="col-md-10 action-main">
      <?= Breadcrumbs::widget([
        'homeLink'=>[
                    'label' => '后台主页',
                    'url' => Url::to(['page/index'])
                ],
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= $content ?>
    </div>
  </div>
  </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 宜昌交旅集团 <?= date('Y') ?></p>

        <p class="pull-right">Powered by 元速科技</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
