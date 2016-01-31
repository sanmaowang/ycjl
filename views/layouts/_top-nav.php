<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="top-nav">
  <div class="container">
    <div class="row">
      <div class="top-quick-link">
        <a href="#" onclick="javascript:setHomepage();">设为首页</a>
        <a href="javascript:addFavorite();">加入收藏</a>
      </div>
      <div class="top-nav-link">
      <ul id="link_websites" class="top-links">
        <li>
          <a href="#" style="padding-bottom:30px;">集团网站群</a>
          <div class="links-level-two" style="display:none;">
            <dl>
              <dd><a href="http://www.ycjyjt.com/" target="_blank">宜昌交运集团</a></dd>
              <dd><a href="http://www.ycbus.com/" target="_blank">宜昌公交集团</a></dd>
              <dd><a href="http://www.xlxia.com/" target="_blank">西陵峡风景区</a></dd>
              <!-- <dd><a href="" target="_blank">宜昌三峡旅游度假区开发有限公司</a></dd> -->
            </dl>
          </div>
        </li>
      </ul>
      <?php 
        $form = ActiveForm::begin([
            'id' => 'search-form',
            'action' => Url::to(['/site/search']),
            'method'=>'get'
        ])
      ?>
      <input type="text" name="t" placeholder="搜索.." class="top-search"/>
      <?= Html::submitButton('搜索', ['class' => 'search-btn']) ?>
      <?php ActiveForm::end();?>
      </div>
      <a href="javascript:void(0);" class="pull-right" style="color:#fff;margin:5px 0;">集团OA</a>
      <a id="wechat" href="javascript:void(0);" class="pull-right" style="color:#fff;margin:5px 0;margin-right:20px;">
        微信公众号
        <div class="wechat-qrcode" style="display:none;">
          <img src="<?php echo Yii::$app->request->baseUrl;?>/img/qrcode.jpg" width="120"/>
          <span>扫一扫 关注交旅</span>
        </div>
      </a>
      
    </div>
  </div>
</div>