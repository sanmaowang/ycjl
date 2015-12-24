<?php 
use yii\web\View;
use yii\helpers\Url;


function display_pages($pages){
  foreach ($pages as $key => $page) {
    if(isset($page)){
      echo '<li><a href="'.Url::to(['site/page','slug'=>$page->slug]).'">'.$page['name'].'</a>';
      if($page['sub']){
        echo "<ul class='sub-column dropdown'>";
        display_pages($page['sub']);
        echo "</ul>";
      }
      echo "</li>";
    }
    
  }
}

?>
<div class="nav">
  <ul>
    <?php display_pages($pages)
    ?>
  </ul>
</div>

<?php
$this->registerJs('

$(document).ready(function(){
  $(".nav li").on("mousemove",function(){
    $(this).find(".dropdown").slideDown();
  });
  $(".nav li").on("mouseleave",function(){
    $(this).find(".dropdown").stop(true,true).slideUp("fast");
  });  
});
',View::POS_END,'menu');
?>
