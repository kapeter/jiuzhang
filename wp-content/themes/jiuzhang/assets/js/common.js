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


    var navIsActive = false;
	$('.nav-bars').on('click',function(event){
        var e = window.event || event;
        e.stopPropagation();
		if (navIsActive){
			$('.nav-bars').removeClass('nav-active');
			$('.full-page').removeClass('page-blur');
			$('.nav').css('left','100%');
            navIsActive = false;
		}else{
			$('.nav-bars').addClass('nav-active');
			$('.full-page').addClass('page-blur');
			$('.nav').css('left','0%');
            navIsActive = true;
		}
	});

    //回到顶部效果
    var timer=null;
    var isHeight = document.documentElement.clientHeight;
    var isTop =true;
    $('#go-top').parent().css('display','none');

    window.onscroll =function(){
        var oTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (!isTop){
            clearInterval(timer);
        }
        $(document).on('mousewheel', function () {
            clearInterval(timer);
        });  
        isTop =false;
        if (oTop > isHeight / 2){
            $('#go-top').parent().css('display','block');
        }else{
            $('#go-top').parent().css('display','none');
        }
    }
    
    $('#go-top').click(function(){
        timer = setInterval(function(){
             var oTop = document.documentElement.scrollTop || document.body.scrollTop;
             var oSpeed = Math.floor(oTop/5);
             document.documentElement.scrollTop = document.body.scrollTop = oTop-oSpeed;
             isTop =true;
             if(oTop == 0){
                 clearInterval(timer);
             }
        },30);
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

$('.nav-second').find('a').each(function(){
	$(this).on('click',function(){
		window.location.reload();
	});
});

$(window).on('orientationchange',function () {
    window.location.reload();
});



