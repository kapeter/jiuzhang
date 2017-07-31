<?php get_header(); ?>
	<div class="full-page" id="page">
		<div class="container clearfix">
			<div class="swiper-container swiper-a">
				<div class="header-logo">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/header.png">
				</div>
			    <div class="swiper-wrapper">
			    	<?php $categories = get_categories(['hide_empty' => 0, 'exclude' => '1']); ?>

			    	<?php foreach ($categories as $value) :  ?>
			    		<?php if ($value->category_parent == 0) : ?>
				        <div class="swiper-slide">
		        			<div class="swiper-images swiper-lazy" data-background="<?=z_taxonomy_image_url($value->term_id); ?>"></div>
				        </div>
				    	<?php endif; ?>
			    	<?php endforeach; ?>
			    	<!-- 关于我们背景图片 -->
			        <div class="swiper-slide">
			        	<div class="swiper-images swiper-lazy" data-background="<?php bloginfo('template_url'); ?>/assets/images/about.jpg"></div>
			        </div>
			        <!-- END 关于我们背景图片 -->			    	
			    </div>
			    <div class="swiper-button-prev swiper-button-white index-button"></div>
   				<div class="swiper-button-next swiper-button-white index-button"></div>
			</div>
			<div class="swiper-text-content">
				<div class="swiper-container swiper-b" id="swiper-b">
					<div class="left-mask"></div>
					<div class="right-mask"></div>
				    <div class="swiper-wrapper">
				    	<?php foreach ($categories as $value) :  ?>
				    		<?php if ($value->category_parent == 0) : ?>
					        <div class="swiper-slide">
					        	<a href="<?=get_category_link( $value->term_id ); ?>" class="swiper-link">
			        				<h2><?=$value->name ?></h2>
			        				<p><?=$value->description ?></p>
			        			</a>
					        </div>
							<?php endif;?>
				    	<?php endforeach; ?>
				    		<!-- 关于我们文字 -->
				    		<div class="swiper-slide">
				    			<a href="/about" class="swiper-link">
			        			<h2>关于九樟</h2>
			        			<p>九樟学社是一个致力于中国乡土文化现代重塑的社会组织。</p>
			        			</a>
					        </div>
					        <!-- END 关于我们文字 -->
				    </div>
				    <div class="swiper-scrollbar"></div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>		

<script type="text/javascript">
	$(function () {

		var winW = $(window).width();

		if (winW < 1200){

		   	var mySwiperA = new Swiper ('.swiper-a', {
			    loop: true,
			    freeMode : false,
			    lazyLoading: true,
			    lazyLoadingOnTransitionStart : true,
			    nextButton: '.swiper-button-next',
			    prevButton: '.swiper-button-prev',
			}); 
			$('.swiper-a').height(window.innerHeight - 210);
			$('.swiper-images').height(window.innerHeight - 210);

			var mySwiperB = new Swiper ('.swiper-b', {
			    loop: true,
			    freeMode : false,
			});
			mySwiperA.params.control = mySwiperB;
			mySwiperB.params.control = mySwiperA;
		}else{

		   	var mySwiperA = new Swiper ('.swiper-a',{
		   		effect : 'fade',
				autoplay:5000,
				lazyLoading: true,
				lazyLoadingOnTransitionStart : true,
				autoplayDisableOnInteraction : false,
		   	}); 
			$('.swiper-images').height(512);

		   	var mySwiperB = new Swiper ('.swiper-b', {
		        scrollbar: '.swiper-scrollbar',
		        slidesPerView: 'auto',
		        freeMode : true,
		        spaceBetween: 30,
		        grabCursor: true,
		        mousewheelControl : true,
				onScroll: function(swiper, event){
					if (mySwiperB.isBeginning){
						$('.left-mask').css('opacity','0');
					}else{
						$('.left-mask').css('opacity','1');
					}
					if (mySwiperB.isEnd){
						$('.right-mask').css('opacity','0');
					}else{
						$('.right-mask').css('opacity','1');
					}
			   	}
			}); 
			$('.swiper-text-content').on('mousewheel',function(event){
				event.preventDefault();
			});
			$('.swiper-b').find('.swiper-slide').each(function (index) {
				$(this).on('mouseover',function () {
					$(this).addClass('swiper-slide-move-active');
					mySwiperA.slideTo(index, 1000, false);
				});
				$(this).on('mouseout',function () {
					$(this).removeClass('swiper-slide-move-active');
				});
			});
		}
	});
</script>