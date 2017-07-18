	<footer class="footer">
		<div class="container">
			<div class="footer-content">
				<?php 
					wp_nav_menu(array( 'theme_location' => 'footer_menu', 'menu_class'=>'footer-link clearfix')); 
				?>
				<p><a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action">浙ICP备17012273</a></p>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/zepto.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/swiper.jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/touch.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/common.js"></script>
</html>