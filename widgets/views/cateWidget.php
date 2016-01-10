<?php 
use yii\web\View;
use yii\helpers\Url;

function display_pages($pages,$current_id,$level){
  $level++;
  foreach ($pages as $key => $page) {
    if(isset($page)){
      $c = "";$d= "";
      if($level == 1){
        $c = "class='main-level'";
        if($current_id == $page->id){
          $d = "class='main-link active'";
          if($current_id == 1){
            $d = "class='main-link active active-left'";
          }
          if($current_id == 26){
            $d = "class='main-link active active-right'";
          }
        }else{
          $d = "class='main-link'";
        }
      }
      echo '<li '.$c.' data-index="'.$key.'"><a href="'.Url::to(['site/page','slug'=>$page->slug]).'" '.$d.'>'.$page['name'].'</a>';
      if($page['sub'] && $level == 1){
        echo "<ul class='sub-column dropdown'>";
        display_pages($page['sub'],$current_id,$level);
        echo "</ul>";
      }
      echo "</li>";
    }
    
  }
}
?>
<div class="nav">
  <div id="hover_bg" class="div-hover" data-left="0"></div>
  <ul id="navbar">
    <?php
    if(isset($current_page)){
      $current_id = ($current_page->parent_id == 0)?$current_page->id:$current_page->parent_id;
    }else{
      $current_id = 1;
    }
     display_pages($pages,$current_id,0)
    ?>
  </ul>
</div>

<?php

$this->registerJs('
$(document).ready(function () {
    var divHoverLeft = 0;
    var obj = $("#hover_bg");
    var aWidth = obj.css("width") > 72?96:72;
    var _index = $(".active").parent().data("index")
    var _left = _index*aWidth;
    
    obj.css({left:_left});

    $(".main-link").on({
        "mouseenter": function () {
            divHoverLeft = GetLeft(this);
            if(divHoverLeft == 0){
              obj.addClass("active-left");
            }else if(divHoverLeft == 7*96){
              obj.addClass("active-right");
            }else{
              obj.removeClass("active-left").removeClass("active-right");
            }
            obj.show().stop(true,true).animate({ width: aWidth, left: divHoverLeft }, 200);
        }
    });

    $("#navbar").on({
        "mouseleave": function (event) {
          obj.hide();
          // obj.animate({ width: aWidth, left: _left }, 200);
        }
    });
});


function GetLeft(element) {
    //获得li之前的同级li元素
    var menuList = $(element).parent().prevAll();
    var left = 0;
    //计算背景遮罩左边距
    $.each(menuList, function (index, ele) {
        left += $(ele).width();
  });
  return left;
}


$(document).ready(function(){
  $(".nav li").on("mouseenter",function(){
    $(this).find(".dropdown").slideDown();
  });
  $(".nav li").on("mouseleave",function(){
    $(this).find(".dropdown").stop(true,true).slideUp("fast");
  });  
});
',View::POS_READY,'menu');
?>
