$(function () {
	$('#search-btn').on('click',function(){
		if ($('.search-bars').hasClass('box-active')){
			if ($('#search-box').val() != ''){
				window.location.href="/?s=" + $('#search-box').val();
			}else{
				$('.search-bars').removeClass('box-active');
			}
		}else{
			$('.search-bars').addClass('box-active');
		}
	});
	$(document).on('keyup',function(e){
		if (e.which == 13){
			if ($('.search-bars').hasClass('box-active') && $('#search-box').val() != ''){
				window.location.href="/?s=" + $('#search-box').val();
			}
		}
	});

	$('.nav-bars').on('click',function(){
		if ($('.nav-bars').hasClass('nav-active')){
			$('.nav-bars').removeClass('nav-active');
			$('.full-page').removeClass('page-blur');
			$('.nav').css('left','100%');
			document.removeEventListener('touchmove',changeMove);
		}else{
			$('.nav-bars').addClass('nav-active');
			$('.full-page').addClass('page-blur');
			$('.nav').css('left','0%');
			document.addEventListener('touchmove',changeMove);
		}
	});

	function changeMove(event){
		event.preventDefault();
	}
})

function getAgent() {  
     var ua = navigator.userAgent,  
     isWindowsPhone = /(?:Windows Phone)/.test(ua),  
     isSymbian = /(?:SymbianOS)/.test(ua) || isWindowsPhone,   
     isAndroid = /(?:Android)/.test(ua),   
     isFireFox = /(?:Firefox)/.test(ua),   
     isChrome = /(?:Chrome|CriOS)/.test(ua),  
     isTablet = /(?:iPad|PlayBook)/.test(ua) || (isAndroid && !/(?:Mobile)/.test(ua)) || (isFireFox && /(?:Tablet)/.test(ua)),  
     isPhone = /(?:iPhone)/.test(ua) && !isTablet,  
     isPc = !isPhone && !isAndroid && !isSymbian && !isTablet;  
     return {  
          isTablet: isTablet,  
          isPhone: isPhone,  
          isAndroid : isAndroid,  
          isPc : isPc  
     };  
}  

$('.nav-second').find('a').each(function(){
	$(this).on('click',function(){
		window.location.reload();
	});
})
