$(function(){
  var curIndex = 0; //当前index
     //  alert(imgLen);
     // 定时器自动变换2.5秒每次
  var autoChange = setInterval(function(){ 
    if(curIndex < $("#home_slider li").length-1){ 
      curIndex ++; 
    }else{ 
      curIndex = 0;
    }
    //调用变换处理函数
    changeTo(curIndex); 
  },8000);

  function changeTo(num){ 
    $("#home_slider").find("li").removeClass("imgOn").fadeOut(1500).eq(num).fadeIn(1000).addClass("imgOn");
  }
})