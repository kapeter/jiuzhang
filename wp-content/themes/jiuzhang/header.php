<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">

<meta name="keywords" content="<?php wp_title( ',', true, 'right' );bloginfo('name'); ?>">

<meta name="description" content="九樟学社是一个致力于中国乡土文化现代重塑的社会组织。">

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/swiper.min.css" />

</head>

<body>
	<header class="header">
		<div class="container clearfix">
			<h1 class="brand"><a href="/">JIUZHANG</a></h1>
			<div class="header-bars">
				<div class="nav-toggle">
					<div class="nav-bars">
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
					</div>					
				</div>
				<div class="search-bars">
					<input id="search-box" class="search-box" type="text" name="s" placeholder="搜索关键词……" value="">
					<i id='search-btn' class="iconfont">&#xe63a;</i>
				</div>
			</div>
		</div>
	</header>
	<nav class="nav">
		<div class="frosted-glass"></div>
		<div class="container">
			<div class="nav-body">
				<?php 
				 	if ( has_nav_menu( 'header_menu' ) ) {
						wp_nav_menu( 
					 		array(
								'theme_location' => 'header_menu',
								'menu_class'     => 'nav-first',
								'walker'         => new wp_headerMenu()
							) 
					 	);
					}
				 ?>
			</div>
		</div>
	</nav>