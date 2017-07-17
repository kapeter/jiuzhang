<?php get_header(); ?>
<div class="full-page" id="page">

	<div class="container clearfix">
		
	    <div class="article">

	    	<?php while ( have_posts() ) : the_post(); update_post_caches($posts); ?>

	    	<h1 class="article-title"><?php the_title();?></h1>
	    	
			<div class="article-content">

	        	<?php the_content(); ?>

	        </div>

	      	<?php endwhile; wp_reset_query(); ?>

	    </div>

	</div>

</div>

<?php get_footer(); ?>