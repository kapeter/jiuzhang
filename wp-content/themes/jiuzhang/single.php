<?php get_header(); ?>
<div class="full-page" id="page">

	<div class="container clearfix">
	
		<?php single_breadcrumbs(); ?>

	    <div class="article">

	    	<?php while ( have_posts() ) : the_post(); update_post_caches($posts); ?>

	    	<?php $link = get_post_meta($post->ID, 'wlink', true); ?>

	    	<?php if ( has_post_thumbnail() ) : ?>
	    		<div class="article-thumbnail">
	    			<?php the_post_thumbnail(); ?>
	    		</div>
			<?php endif; ?>

	    	<h1 class="article-title"><?php the_title();?></h1>

	    	<div class="article-info">
	    		<p><?=get_post_meta($post->ID, 'writer', true) ?></p>
				<p><?php the_time('Y.m.d') ?></p>
	        </div>
	    	
			<div class="article-content">

	        	<?php the_content(); ?>

	        	<p class="copyright">
	        		*版权声明：本网站上所有内容的版权，归九樟学社及各作者所有，不得在未经许可的情况下复制、分发、或其他商业用途。
	        	</p>

	        </div>

			<?php if ( comments_open() ) comments_template(); ?>

	      	<?php endwhile; wp_reset_query(); ?>

	    </div>

	</div>

</div>

<ul class="sidebar">
	<li>
		<a href="javascript:;" id="share-btn"><i class="iconfont">&#xe60f;</i></a>
	</li>
	<li>
		<a href="javascript:;" id="go-top"><i class="iconfont">&#xe664;</i></a>
	</li>
</ul>
<!-- 模态框 -->
<div class="modal">
	<div class="modal-body">
		<div class="modal-header clearfix">
			<ul class="modal-button">
				<li>
					<a href="javascript:;" class="modal-close" id="modal-close"><i class="iconfont">&#xe602;</i></a>
				</li>
			</ul>
		</div>
		<div class="modal-content clearfix">
			<?php if (!empty($link)) : ?>
				<div id="qrcode" class="qrcode"></div>
			<?php endif; ?>
			<div class="share-box">
 				<a class="sina" href="javascript:void((function(s,d,e,r,l,p,t,z,c){var%20f='http://v.t.sina.com.cn/share/share.php?appkey=2992571369',u=z||d.location,p=['&url=',e(u),'&title=',e(t||d.title),'&source=',e(r),'&sourceUrl=',e(l),'&content=',c||'gb2312','&pic=',e(p||'')].join('');function%20a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=440,height=430,left=',(s.width-440)/2,',top=',(s.height-430)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent,'','','','','',''));"><i class="iconfont sina">&#xe731;</i></a> 
				<p>新浪微博</p>
			</div>
			<div class="share-box">
				<a class="douban" href="javascript:void(function(){var d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:'',r='https://www.douban.com/recommend/?url='+e(d.location.href)+'&title='+e(d.title)+'&sel='+e(s)+'&v=1',w=480,h=400,x=function(){if(!window.open(r,'douban','toolbar=0,resizable=1,scrollbars=yes,status=1,width='+w+',height='+h+',left='+(screen.width-w)/2+',top='+(screen.height-h)/2))location.href=r+'&r=1'};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})()"><i class="iconfont">&#xe654;</i></a>
				<p>豆瓣</p>
			</div>
			<div class="share-box">
				<a class="facebook" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(document.location.href)+'&amp;t='+encodeURIComponent(document.title),'_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=600, height=450,top=100,left=350');void(0)"><i class="iconfont">&#xe6a2;</i></a>
				<p>Facebook</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/qrcode.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('#share-btn').on('click',function () {
			<?php if (!empty($link)) : ?>
				document.getElementById("qrcode").innerHTML = '';
				var qrcode = new QRCode(document.getElementById("qrcode"), {
					width : 100,
					height : 100
				});
				qrcode.makeCode('<?=$link ?>');
			<?php endif; ?>
			$('.modal').addClass('modal-active');
		});
		$('#modal-close').on('click',function () {
			$('.modal').removeClass('modal-active');
		});
	})
</script>
