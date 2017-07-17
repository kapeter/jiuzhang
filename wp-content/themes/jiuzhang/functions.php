<?php

/*支持菜单*/

if(function_exists('register_nav_menus')){

	register_nav_menus(
		array(
    		'header_menu' => '网站顶部导航',
    		'footer_menu' => '网站底部导航'
		)
	);

}

/*定制头部菜单*/

class wp_headerMenu extends Walker_Nav_Menu {  

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		if( $depth == 0 ){
			$output .= '<ul class="nav-second">';
		}
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		if( $depth == 0 ){
			$output .= "</ul>";
		}
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	        $t = '';
	        $n = '';
	    } else {
	        $t = "\t";
	        $n = "\n";
	    }
	    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
	 
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[] = 'menu-item-' . $item->ID;

	    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
	 
	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	 
	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	 
	    $output .= $indent . '<li' . $id . $class_names .'>';
	 
	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    if ($item->menu_item_parent != '0' && !empty( $item->url ) ){
	    	$sep = strrpos($item->url, '/');
	    	$url_before = substr($item->url, 0, $sep);
	    	$url_after = substr($item->url, $sep+1, strlen($item->url));
	    	$item->url = $url_before.'#'.$url_after;
	 	}
	 	$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	 
	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	        if ( ! empty( $value ) ) {
	            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	            $attributes .= ' ' . $attr . '="' . $value . '"';
	        }
	    }
	 
	    /** This filter is documented in wp-includes/post-template.php */
	    $title = apply_filters( 'the_title', $item->title, $item->ID );
	 
	    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
	 
	    $item_output = $args->before;
	    $item_output .= '<a'. $attributes .'>';
	    $item_output .= $args->link_before . $title . $args->link_after;
	    $item_output .= '</a>';
	    $item_output .= $args->after;

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
  
}

/*开启缩略图*/
add_theme_support('post-thumbnails', array('post'));



/*移除图片的默认宽度与高度*/ 
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
 
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';


/* 页面面包屑 */
function single_breadcrumbs() {
	echo '<ul class="breadcrumbs clearfix">';
	$category = get_the_category()[0];
	$parent = get_category($category->category_parent);
	echo '<li><a href="'. get_category_link($parent->cat_ID) .'">'.$parent->name.'</a></li>';
	echo '<li><a href="'. get_category_link($parent->cat_ID). '#' . $category->slug .'">'.$category->name.'</a></li>';
	echo '</ul>';
}

?>