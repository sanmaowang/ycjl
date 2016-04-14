$(function(){
		$('.list li').on('mouseenter',function(){
			$(this).addClass('thiscur');
		})
		$('.list li').on('mouseleave',function(){
			$(this).removeClass('thiscur');
		})
		$('#content1').addClass('scroll');
		$('.list li').eq(0).animate({opacity:1},3000,function(){
			$('.list li').eq(0).show();
			$('.list li').eq(1).animate({opacity:1},950,function(){
				$('.list li').eq(2).animate({opacity:1},950,function(){
					$('.list li').eq(3).animate({opacity:1},950,function(){
						$('.list li').eq(4).animate({opacity:1},950,function(){
							$('.list li').eq(5).animate({opacity:1},950,function(){
								$('.list li').eq(6).animate({opacity:1},950,function(){
									$('.list li').eq(7).animate({opacity:1},950,function(){
										$('.list li').eq(8).animate({opacity:1},950,function(){
										})
									})
								})
							})
						})
					})
				})
			});
		});
	})