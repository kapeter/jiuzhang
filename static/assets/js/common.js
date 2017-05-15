$(function () {
	$('#search-btn').on('click',function(){
		if ($('.search-bars').find('.box-active').length != 0){
			$('.search-box').removeClass('box-active');
		}else{
			$('.search-box').addClass('box-active');
		}
	});

	$('.nav-bars').on('click',function(){
		if ($('.nav-toggle').find('.nav-active').length != 0){
			$('.nav-bars').removeClass('nav-active');
			$('.nav').css('left','100%');
			$('.full-page').removeClass('page-blur');
			//$("body").eq(0).removeClass('no-srcoll');
		}else{
			$('.nav-bars').addClass('nav-active');
			$('.nav').css('left','0%');
			$('.full-page').addClass('page-blur');
			//$("body").eq(0).addClass('no-srcoll');
		}
	});

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
     isPc = !isPhone && !isAndroid && !isSymbian;  
     return {  
          isTablet: isTablet,  
          isPhone: isPhone,  
          isAndroid : isAndroid,  
          isPc : isPc  
     };  
}  