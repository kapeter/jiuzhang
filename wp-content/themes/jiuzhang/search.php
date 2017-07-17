<?php get_header(); ?>

<div class="container search-container clearfix">
    <h1 class="result-title"><span style="color: #fa4646;"><?php echo get_search_query(); ?></span>的搜索结果</h1>
    <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>
              <?php
                  $s = trim(get_search_query()) ? trim(get_search_query()) : 0;
                  $title = get_the_title();
                  $content = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 350,"......"); 
                  if($s){
                    $keys = explode(" ",$s);
                  } 
                  $title = preg_replace('/('.implode('|', $keys) .')/iu','<span style="color: #fa4646;">\0</span>',$title); 
                  $content = preg_replace('/('.implode('|', $keys) .')/iu','<span style="color: #fa4646;">\0</span>',$content);
              ?>
              <div class="result-box">
                  <h2>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
                  </h2>
                  <p><?php echo $content; ?></p>
                  <p class="result-info">
                    <a href="<?php the_permalink(); ?>">阅读全文</a>
                    <?php $category = get_the_category()[0]; ?>
                    <?php if (isset($category)) : ?>
                      <span>所属系列: <?php echo $category->name ?></span>
                    <?php endif; ?>
                  </p>
              </div>
        <?php endwhile; ?>
	  <?php else : ?>
      <div class="gg">抱歉，没有找到符合搜索条件的内容！</div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>