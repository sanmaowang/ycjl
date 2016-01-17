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
    <?php
    NavBar::begin([
        'brandLabel' => '交旅集团网站后台管理系统',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-custom navbar-fixed-top',
        'containerOptions'=>'container-fluid'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => '内容管理', 'url' => ['/page/index']],
            // ['label' => '资源管理', 'url' => ['/source/index']],
            ['label' => '用户管理', 'url' => ['/user/index']],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/admin/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/admin/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
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
