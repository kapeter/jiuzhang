<?php get_header(); ?>
<div class="full-page" id="page">

	<div class="container clearfix">
	
		<?php single_breadcrumbs(); ?>

	    <div class="article">

	    	<?php while ( have_posts() ) : the_post(); update_post_caches($posts); ?>

	    	<?php if ( has_post_thumbnail() ) : ?>
	    		<div class="article-thumbnail">
	    			<?php the_post_thumbnail(); ?>
	    		</div>
			<?php endif; ?>

	    	<h1 class="article-title"><?php the_title();?></h1>

	    	<div class="article-info">
	    		<p><?=get_post_meta($post->ID, 'writer', true) ?></p>
				<p><?php the_time('Y.m.d') ?></p>
				<p><a href="javascript:;"><i class="iconfont">&#xe616;</i></a></p>
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

<?php get_footer(); ?>