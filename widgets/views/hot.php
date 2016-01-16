<?php 
use yii\web\View;
use yii\helpers\Url;
?>
<div class="relate-post">
  <div class="row">
    <div class="col-xs-6">
      <h4>相关新闻</h4>
      <div class="relate-news">
        <div class="news-list">
          <ul>
            <?php for($i = 0; $i < 5; $i++){?>
            <li><a href="<?= Url::to(['site/view-post','id'=>$relate[$i]->id])?>"><?= $relate[$i]->name;?></a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <h4>热点推荐</h4>
      <?php for($i = 0; $i < 2; $i++){?>
      <div class="hot-news">
        <a href="<?= Url::to(['site/view-post','id'=>$hot[$i]->id])?>" class="hot-news-title"><?= $hot[$i]->name;?></a>
        <p class="hot-news-content">
          <?= $hot[$i]->shortexcerpt;?>
        </p>
      </div>
      <?php }?>
    </div>
  </div>
</div>
