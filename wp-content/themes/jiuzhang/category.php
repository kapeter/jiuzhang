<?php get_header(); ?>

  <div class="container">
    <div class="list-content clearfix full-page">
      <div class="list-left">
        <div class="list-header">
          <?php 
            if(is_category()) { 
              $catName = get_query_var('cat');
              $thisCat = get_category($catName);  //当前分类
              $categories = get_categories(['hide_empty' => 0, 'exclude' => '1']);   //所有分类
              $chlidNum = 0;
            } 

          ?>  
          <h1><?=$thisCat->name ?></h1>
          <p><?=$thisCat->description ?></p>
        </div>
        <ul class="series-list">
            <?php foreach ($categories as $value) :  ?>
              <?php if ($value->category_parent == $thisCat->term_id) : ?>
                <?php $chlidNum++; ?>
                <li class="<?=$value->slug ?>"><a href="javascript:;"><?=$value->name ?></a></li>
              <?php endif; ?>

            <?php endforeach; ?>
            <?php if ($chlidNum == 0) : ?>
              <li>暂无系列</li>
            <?php endif; ?>
        </ul> 
        <ul class="list-ul">
            <?php foreach ($categories as $value) :  ?>
              <?php if ($value->category_parent == 0 && $value->term_id != $thisCat->term_id) : ?>
                <li><a href="<?=get_category_link( $value->term_id); ?>"><?=$value->name ?></a></li>
              <?php endif; ?>

            <?php endforeach; ?>
        </ul>

      </div>
      <div class="list-right">
        <?php if ($chlidNum != 0) : ?>
        <div class="swiper-container swiper-a swiper-list">
            <div class="swiper-wrapper">
              <?php foreach ($categories as $value) :  ?>
                <?php if ($value->category_parent == $thisCat->term_id) : ?>
                <div class="swiper-slide">
                  <div class="swiper-images swiper-lazy" data-background="<?=z_taxonomy_image_url($value->term_id); ?>"></div>
                </div>
                <?php endif; ?>

              <?php endforeach; ?>
              
            </div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>
        <?php else : ?>
            <p>该项目即将上线，尽情期待。</p>
        <?php endif; ?>

        <div class="swiper-container swiper-list-content">
            <div class="swiper-wrapper">
              <?php foreach ($categories as $value) :  ?>
                <?php if ($value->category_parent == $thisCat->term_id) : ?>
                <div class="swiper-slide" data-id="<?=$value->slug ?>">
                  <h2><?=$value->name ?></h2>
                  <div class="padding-30">
                    <div class="list-project-info clearfix">
                      <p><?=$value->description ?></p>
                      <a href="#" class="enter-btn"><i class="iconfont">&#xe615;</i></a>
                    </div>
                    <ul class="list-article-box">
                      <?php $posts = get_posts( "numberposts=-1&category=".$value->term_id ); ?>  
                      <?php if( $posts ) : ?>  
                        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>  
                        <li>  
                          <h3><a href="<?=the_permalink() ?>" title="<?=the_title() ?>"><?=the_title() ?></a></h3>
                          <span><?=the_time('Y.m.d') ?>&nbsp;&nbsp;&nbsp;&nbsp;<?=get_post_meta($post->ID, 'writer', true) ?></span>
                          <p><?=mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?></p>
                        </li>  
                        <?php endforeach; ?>
                        <?php else : ?>
                        <li>该系列暂无文章，我们将尽快添加内容。</li>  
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                <?php endif; ?>

              <?php endforeach; ?>  
            </div>
        </div>      
      </div>
    </div>
  </div>

<?php get_footer(); ?>

<script type="text/javascript">
  $(function () {
    var winW = $(window).width();

    if (winW > 1200){
      var minH = $('.list-left').height();
      $('.list-right').css('min-height',minH + 'px');
    }

    $('.swiper-images').css({'height':'300px'});
    
    var mySwiperA = new Swiper ('.swiper-a', {
        // 如果需要分页器
        pagination: '.swiper-pagination',
        // 如果需要前进后退按钮
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        lazyLoading: true,
        lazyLoadingOnTransitionStart : true,
    }); 
    var mySwiperB = new Swiper ('.swiper-list-content', {
        autoHeight: true,
        roundLengths : true, 
        onSlideChangeEnd: function(swiper){
          $('.series-list').find('.link-active').removeClass('link-active');
          $('.series-list > li').eq(swiper.activeIndex).addClass('link-active');
          var name = $('.swiper-list-content').find('.swiper-slide').eq(swiper.activeIndex).data('id');
          changeHistory(name);
        }
    });

    mySwiperA.params.control = mySwiperB;
    mySwiperB.params.control = mySwiperA;

    var myHash = window.location.hash;
    if (myHash != ''){
      myHash = myHash.substring(1);
      $('.series-list').find('.'+myHash).addClass('link-active');
      $('.swiper-list-content').find('.swiper-slide').each(function(index){
        if ($(this).data('id') == myHash){
          mySwiperB.slideTo(index, 0, false);
          var slide = $('.swiper-a').find('.swiper-slide').eq(index).find('.swiper-images');
          var backImg = slide.data('background');
          slide.css('background-image','url("'+backImg+'")');
          slide.addClass('swiper-lazy-loaded');
        }
      });
    }else{
      $('.series-list > li').eq(0).addClass('link-active');
      mySwiperB.slideTo(0, 0, false);
    }

    $('.series-list > li').each(function(index){
      $(this).on('click',function(){
        if ($(this).hasClass('link-active')){
          return false;
        }else{
          $('.series-list').find('.link-active').removeClass('link-active');
          $(this).addClass('link-active');
          mySwiperB.slideTo(index, 300, false);
          var name = $('.swiper-list-content').find('.swiper-slide').eq(index).data('id');
          changeHistory(name);
        }
      });
    });
    //改变历史记录
    function changeHistory(name){
      if ('pushState' in history) {
        var url = window.location.pathname + '#' + name;
        history.pushState(null,'',url);
      }
    }
    $(window).on('popstate',function(){
      window.location.reload();
    });

  });
</script>