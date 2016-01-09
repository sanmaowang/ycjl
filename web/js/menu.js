$(document).ready(function () {
    var divHoverLeft = 0;
    var aWidth = 96;
    //菜单滑动动画
    $(".main-link").on({
         /*此处用mouseover或者mouseenter均可，如果以后要为X标签同时添加悬停和移出事件，建议用enter和leave也就是传说中的hover事件，因为里面事件冒泡已经处理过，就不会出现类似over和out之类的情况了*/
        "mouseenter": function () {
            divHoverLeft = GetLeft(this);
            //设置滑动动画
             $("#hover_bg").animate({ width: aWidth, left: divHoverLeft }, 150);
        },
        "click": function () {
            divHoverLeft = GetLeft(this);
            //清除所有a标签class
            $(".main-link").removeClass("active");
            //设置当前点击菜单为激活状态
            $(this).addClass('active');
            $("#hover_bg").data("left",divHoverLeft);
            $(".h-width").val(aWidth);
        }
    });

    /*鼠标滑出UL或者div-nav背景div-hover自动定位到激活菜单处*/
    //mouseleave事件定位到ul或者div-nav均可
    $("#navbar").on({
        "mouseleave": function (event) {
            $(".div-hover").animate({ width: aWidth, left: parseInt($("#hover_bg").data("left")) }, 150);
        }
    });
});


//获得div-hover左边距
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
