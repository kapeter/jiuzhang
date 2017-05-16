$(function () {
	$('#search-btn').on('click',function(){
		if ($('.search-box').hasClass('box-active')){
			$('.search-box').removeClass('box-active');
			console.log('dadsa');
		}else{
			$('.search-box').addClass('box-active');
		}
	});

	$('.nav-bars').on('click',function(){
		if ($('.nav-bars').hasClass('nav-active')){
			$('.nav-bars').removeClass('nav-active');
			$('.full-page').removeClass('page-blur');
			$('.nav').css('left','100%');
		}else{
			$('.nav-bars').addClass('nav-active');
			$('.full-page').addClass('page-blur');
			$('.nav').css('left','0%');
			
		}
	});
	$(window).resize(function(){
		window.location.reload();
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
     isPc = !isPhone && !isAndroid && !isSymbian && !isTablet;  
     return {  
          isTablet: isTablet,  
          isPhone: isPhone,  
          isAndroid : isAndroid,  
          isPc : isPc  
     };  
}  