<?php include_once( 'options/index.php' );?>
<?php include_once( 'widgets/test.php' );?>
<?php
/**
 * Bmqy-next only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'bmqynext_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own bmqynext_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function bmqynext_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/bmqy.next
	 * If you're building a theme based on bmqy.next, use a find and replace
	 * to change 'bmqynext' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bmqynext' , get_template_directory() .'/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bmqynext' ),
		'social'  => __( 'Social Links Menu', 'bmqynext' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // bmqynext_setup
add_action( 'after_setup_theme', 'bmqynext_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function bmqynext_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bmqynext_content_width', 840 );
}
add_action( 'after_setup_theme', 'bmqynext_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function bmqynext_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bmqynext' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'bmqynext' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'bmqynext' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'bmqynext' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'bmqynext' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'bmqynext' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bmqynext_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function bmqynext_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'bmqynext_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function bmqynext_scripts() {
	// Theme stylesheet.
	if(get_option('bmqynext_options_style')==='mist') {
		wp_enqueue_style( 'bmqynext-style', get_template_directory_uri() . '/css/mist.css', '', '5.1.4' );
	}else if(get_option('bmqynext_options_style')==='pisces'){
		wp_enqueue_style( 'bmqynext-style', get_template_directory_uri() . '/css/pisces.css', '', '5.1.4' );
	}else if(get_option('bmqynext_options_style')==='gemini'){
		wp_enqueue_style( 'bmqynext-style', get_template_directory_uri() . '/css/gemini.css', '', '5.1.4' );
	}else{
		wp_enqueue_style( 'bmqynext-style', get_template_directory_uri() . '/css/muse.css', '', '5.1.4' );
	}
	wp_enqueue_style( 'bmqynext-font-awesome', get_template_directory_uri().'/lib/font-awesome/css/font-awesome.min.css', '', '4.7.0' );
	wp_enqueue_style( 'bmqynext-fancybox-css', get_template_directory_uri().'/lib/fancybox/source/jquery.fancybox.css', '', '4.7.0' );
	wp_enqueue_style( 'bmqynext-style-default', get_stylesheet_uri() );
	if(get_option('bmqynext_options_custom_stylesheet')==='1'){
		wp_enqueue_style( 'bmqynext-style-custom', get_template_directory_uri() . '/css/custom.css', '' );
	}
	if(get_option('bmqynext_options_show_eevee')==='1') {
		wp_enqueue_style( 'bmqynext-eevee', get_template_directory_uri() . '/template-parts/eevee/eevee.css', '', '20180625' );
	}

	wp_enqueue_script( 'bmqynext-jquery', get_template_directory_uri().'/lib/jquery/index.js', '', '2.1.3', true );
	wp_enqueue_script( 'bmqynext-fastclick', get_template_directory_uri().'/lib/fastclick/lib/fastclick.min.js', '', '1.0.6', true );
	wp_enqueue_script( 'bmqynext-lazyload', get_template_directory_uri().'/lib/jquery_lazyload/jquery.lazyload.js', '', '1.9.7', true );
	wp_enqueue_script( 'bmqynext-velocity', get_template_directory_uri().'/lib/velocity/velocity.min.js', '', '1.2.1', true );
	wp_enqueue_script( 'bmqynext-velocity-ui', get_template_directory_uri().'/lib/velocity/velocity.ui.min.js', '', '1.2.1', true );
	wp_enqueue_script( 'bmqynext-fancybox-js', get_template_directory_uri().'/lib/fancybox/source/jquery.fancybox.pack.js', '', '2.1.5', true );
	wp_enqueue_script( 'bmqynext-utils', get_template_directory_uri().'/js/src/utils.js', '', '5.1.1', true );
	wp_enqueue_script( 'bmqynext-motion', get_template_directory_uri().'/js/src/motion.js', '', '5.1.1', true );
	wp_enqueue_script( 'bmqynext-scrollspy', get_template_directory_uri().'/js/src/scrollspy.js', '', '5.1.1', true );
	wp_enqueue_script( 'bmqynext-post_details', get_template_directory_uri().'/js/src/post-details.js', '', '5.1.1', true );
	wp_enqueue_script( 'bmqynext-bootstrap', get_template_directory_uri().'/js/src/bootstrap.js', '', '5.1.1', true );
	if(get_option('bmqynext_options_mouse_effects')==='1'){
		wp_enqueue_script( 'bmqynext-mouse_click_effects', get_template_directory_uri().'/js/src/mouse_click_effects.js', '', '20180625', true );
	}

	if(get_option('bmqynext_options_bg_effects')==='canvas_nest'){
		wp_enqueue_script( 'bmqynext_options_bg_effects', get_template_directory_uri().'/lib/three/three.min.js', '', '20180625', true );
		wp_enqueue_script( 'bmqynext_options_bg_effects_js', get_template_directory_uri().'/lib/canvas-nest/canvas-nest.min.js', '', '20180625', true );
	}
	if(get_option('bmqynext_options_bg_effects')==='three_waves'){
		wp_enqueue_script( 'bmqynext_options_bg_effects', get_template_directory_uri().'/lib/three/three.min.js', '', '20180625', true );
		wp_enqueue_script( 'bmqynext_options_bg_effects_js', get_template_directory_uri().'/lib/three/three-waves.min.js', '', '20180625', true );
	}
	if(get_option('bmqynext_options_bg_effects')==='canvas_lines'){
		wp_enqueue_script( 'bmqynext_options_bg_effects', get_template_directory_uri().'/lib/three/three.min.js', '', '20180625', true );
		wp_enqueue_script( 'bmqynext_options_bg_effects_js', get_template_directory_uri().'/lib/three/canvas_lines.min.js', '', '20180625', true );
	}
	if(get_option('bmqynext_options_bg_effects')==='canvas_sphere'){
		wp_enqueue_script( 'bmqynext_options_bg_effects', get_template_directory_uri().'/lib/three/three.min.js', '', '20180625', true );
		wp_enqueue_script( 'bmqynext_options_bg_effects_js', get_template_directory_uri().'/lib/three/canvas_sphere.min.js', '', '20180625', true );
	}
	if(get_option('bmqynext_options_bg_effects')==='canvas_ribbon' && get_option('bmqynext_options_style')==='pisces'){
		wp_enqueue_script( 'bmqynext_options_bg_effects', get_template_directory_uri().'/lib/three/three.min.js', '', '20180625', true );
		wp_enqueue_script( 'bmqynext_options_bg_effects_js', get_template_directory_uri().'/lib/canvas-ribbon/canvas-ribbon.js', '', '20180625', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//wp_enqueue_script( 'bmqynext-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );
}
add_action( 'wp_enqueue_scripts', 'bmqynext_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function bmqynext_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bmqynext_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function bmqynext_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function bmqynext_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'bmqynext_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function bmqynext_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'bmqynext_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function bmqynext_widget_tag_cloud_args( $args = [] ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'bmqynext_widget_tag_cloud_args' );

/******************************************************以下为 bmqy-next 主题，新增自定义函数*/
/*
 * 添加自定义页面
 * */
function bmqynext_add_page($title, $slug, $page_template=''){
	$allPages = get_pages();//获取所有页面
	$exists = false;
	foreach( $allPages as $page ){
		//通过页面别名来判断页面是否已经存在
		if( strtolower( $page->post_name ) == strtolower( $slug ) ){
			$exists = true;
		}
	}
	if( $exists == false ) {
		$new_page_id = wp_insert_post(
			array(
				'post_title' => $title,
				'post_type'     => 'page',
				'post_name'  => $slug,
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_content' => '',
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 0
			)
		);
		//如果插入成功 且设置了模板
		if($new_page_id && $page_template!=''){
			//保存页面模板信息
			update_post_meta($new_page_id, '_wp_page_template',  $page_template);
		}
	}
}
function bmqynext_add_pages() {
	global $pagenow;
	//判断是否为激活主题页面
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){
		bmqynext_add_page('category','category','category.php'); //页面标题ASHU_PAGE 别名ashu-page  页面模板page-ashu.php
		bmqynext_add_page('tag','tag','tag.php');
		bmqynext_add_page('about','about','about.php');
		bmqynext_add_page('archives','archive','archive.php');
	}
}
add_action( 'load-themes.php', 'bmqynext_add_pages' );

/*
 * 归档
 * */
function bmqynext_archives_list() {
	global $posts_per_page, $paged;
	//if( !$output = get_option('bmqynext_db_cache_archives_list') ){
	if( true ){
		$output = '<span class="archive-move-on"></span>';
		$output .= '<span class="archive-page-counter">'. sprintf( __('Very good! There are now %s logs. Keep trying.', 'bmqynext'), bmqynext_get_posts_count()) .'</span>';
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $posts_per_page, //全部 posts
			'ignore_sticky_posts' => 1, //忽略 sticky posts
			'paged' => $paged,
		);
		$the_query = new WP_Query( $args );
		$posts_rebuild = array();
		$year = $mon = 0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$post_year = get_the_time('Y');
			$post_mon = get_the_time('m');
			$post_day = get_the_time('d');
			if ($year != $post_year) $year = $post_year;
			if ($mon != $post_mon) $mon = $post_mon;
			$posts_rebuild[$year][$mon][] = '<article class="post post-type-normal" itemscope="" itemtype="http://schema.org/Article"><header class="post-header"><h2 class="post-title"><a class="post-title-link" href="'. get_permalink() .'" itemprop="url"><span itemprop="name">'. get_the_title() .'</span></a></h2><div class="post-meta"><time class="post-time" itemprop="dateCreated" datetime="'. get_the_time() .'" content="'. $post_year.'-'.$post_mon.'-'.$post_day .'">'. $post_mon.'-'.$post_day .'</time></div></header></article>';
		endwhile;
		wp_reset_postdata();

		foreach ($posts_rebuild as $key_y => $y) {
			$y_i = 0; $y_output = '';
			foreach ($y as $key_m => $m) {
				$posts = ''; $i = 0;
				foreach ($m as $p) {
					++$i; ++$y_i;
					$posts .= $p;
				}
				$y_output .= $posts;
				$y_output .= '</ul></li>';
			}
			$output .= '<div class="collection-title"><h2 class="archive-year motion-element" id="archive-year-'. $key_y .'">'. $key_y .'</h2></div>';
			$output .= $y_output;
			$output .= '</ul>';
		}

		$output .= '</div>';
		update_option('bmqynext_db_cache_archives_list', $output);
	}
	echo $output;
	bmqynext_query_pagination($args);
}
function bmqynext_clear_db_cache_archives_list() {
	update_option('bmqynext_db_cache_archives_list', '');
}
add_action('save_post', 'bmqynext_clear_db_cache_archives_list');

/*
 * 自定义后台登录地址
 * */
if(get_option('bmqynext_options_login_security')==='1'){
	add_action('login_enqueue_scripts','bmqynext_login_security');
	function bmqynext_login_security(){
		$loginSecurityFalg = (get_option('bmqynext_options_login_security_flag')!='')?get_option('bmqynext_options_login_security_flag'):'flag';
		$loginSecurityRedirect = (get_option('bmqynext_options_login_security_redirect')!='')?get_option('bmqynext_options_login_security_redirect'):site_url();
		if(empty($_GET['security'])){
			header('Location: '. $loginSecurityRedirect);
		}else{
			if($_GET['security'] != $loginSecurityFalg)header('Location: '. $loginSecurityRedirect);
		}
	}
}

function bmqynext_query_pagination($query_string){
	global $posts_per_page, $paged;
	$query_string['posts_per_page'] = -1;
	$my_query = new WP_Query($query_string);
	$total_posts = $my_query->post_count;
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;
	$range = 2;

	$showitems = ($range * 2)+1;
	$pages = ceil($total_posts/$posts_per_page);
	if(1 != $pages){
		echo "<nav id='pagination' class='pagination'>";
		//echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";
		echo ($paged > 1 && $showitems < $pages)? "<a class='extend prev' rel='prev' href='".get_pagenum_link($prev)."'><i class=\"fa fa-angle-left\"></i></a>":"";
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class='page-number current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='page-number' >".$i."</a>";
			}
		}
		echo ($paged < $pages && $showitems < $pages) ? "<a class='extend next' rel='next' href='".get_pagenum_link($next)."'><i class=\"fa fa-angle-right\"></i></a>" :"";
		//echo ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";
		echo "</nav>\n";
	}
}

/*
 * tags list
 * */
function bmqynext_tags_list($text) {
	$text = preg_replace_callback('|<a (.+?)>|i', 'bmqynext_tags_list_callback', $text);
	return $text;
}
function bmqynext_tags_list_callback($matches) {
	$text = $matches[1];
	$color = dechex(rand(0,16777215));//修改此处可以控制随机色彩值的范围
	$pattern = '/style=(\'|\")(.*)(\'|\")/i';
	$text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
	return "<a $text>";
}
add_filter('wp_tag_cloud', 'bmqynext_tags_list', 1);

/*
 * category list
 * */
function bmqynext_categories_list(){
	$output = wp_list_categories([
		'depth'=> 3,
		'show_count'=> 1,
		'hide_empty'=> 0,
		'title_li'=> '',
		'echo' => false,
	]);
	$output = preg_replace( '/cat-item cat-item-(\d+)/', 'category-list-item category-list-item-$1', $output );
	$output = preg_replace( '/class=[\"\']children[\"\']/', 'class="category-list-child"', $output );
	$output = preg_replace( '/\((\d+)\)/', '<span class="category-list-count">$1</span>', $output );
	echo $output;
}

/*
 * 输出container classname
 * */
function bmqynext_container_class(){
	$currentPage = explode('.', get_page_template_slug());
	if (count($currentPage)>=2){
		return 'page-'. $currentPage[0];
	}
}

/*
 * 生成评论链接
 * */
function bmqynext_comments_popup_link() {
	$id = get_the_ID();
	$number = get_comments_number( $id );

	echo '<a href="';
	if ( 0 == $number ) {
		$respond_link = get_permalink() . '#respond';
		/**
		 * Filters the respond link when a post has no comments.
		 *
		 * @since 4.4.0
		 *
		 * @param string $respond_link The default response link.
		 * @param integer $id The post ID.
		 */
		echo apply_filters( 'respond_link', $respond_link, $id );
	} else {
		comments_link();
	}
	echo '"';
	echo ' itemprop="discussionUrl">';
	echo '<span class="cy_cmt_count" itemprop="commentsCount">'. $number .'</span>';
	echo '</a>';
}

/*
 * 生成编辑文章链接
 * */
function bmqynext_edit_post_link( $text = null, $before = '', $after = '', $id = 0, $class = 'post-edit-link' ) {
	if ( ! $post = get_post( $id ) ) {
		return;
	}

	if ( ! $url = get_edit_post_link( $post->ID ) ) {
		return;
	}

	if ( null === $text ) {
		$text = __( 'Edit This' );
	}

	$title = sprintf(__( 'Edit&ldquo;%s&rdquo;', 'bmqynext' ),get_the_title($post->ID));

	$link = '<a href="' . esc_url( $url ) . '" target="_blank" title="'. $title .'">' . $text . '</a>';

	/**
	 * Filters the post edit link anchor tag.
	 *
	 * @since 2.3.0
	 *
	 * @param string $link    Anchor tag for the edit link.
	 * @param int    $post_id Post ID.
	 * @param string $text    Anchor text.
	 */
	echo $before . apply_filters( 'edit_post_link', $link, $post->ID, $text ) . $after;
}

/*
 * 控制文章摘要显示字数
 * */
function custom_excerpt_length( ) {
	return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

/*
 * 自定义分页
 * */
if(!function_exists("bmqynext_pagination")) {
	function bmqynext_pagination($args = array(
		"prev_text"=>"<i class=\"fa fa-angle-left\"></i>",
		"next_text"=>"<i class=\"fa fa-angle-right\"></i>"
		)
	) {
		global $wp_query, $wp_rewrite;

		$template = '
	<nav class="pagination" role="pagination">
		%1$s
	</nav>';

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );

		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

		// URL base depends on permalink settings.
		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		$defaults = array(
			'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
			'format'             => $format, // ?page=%#% : %#% is replaced by the page number
			'total'              => $total,
			'current'            => $current,
			'aria_current'       => 'page',
			'show_all'           => false,
			'prev_next'          => true,
			'prev_text'          => __( '&laquo; Previous' ),
			'next_text'          => __( 'Next &raquo;' ),
			'end_size'           => 1,
			'mid_size'           => 2,
			'type'               => 'plain',
			'add_args'           => array(), // array of query args to add
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => '',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! is_array( $args['add_args'] ) ) {
			$args['add_args'] = array();
		}

		// Merge additional query vars found in the original URL into 'add_args' array.
		if ( isset( $url_parts[1] ) ) {
			// Find the format argument.
			$format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
			$format_query = isset( $format[1] ) ? $format[1] : '';
			wp_parse_str( $format_query, $format_args );

			// Find the query args of the requested URL.
			wp_parse_str( $url_parts[1], $url_query_args );

			// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
			foreach ( $format_args as $format_arg => $format_arg_value ) {
				unset( $url_query_args[ $format_arg ] );
			}

			$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
		}

		// Who knows what else people pass in $args
		$total = (int) $args['total'];
		if ( $total < 2 ) {
			return;
		}
		$current  = (int) $args['current'];
		$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
		if ( $end_size < 1 ) {
			$end_size = 1;
		}
		$mid_size = (int) $args['mid_size'];
		if ( $mid_size < 0 ) {
			$mid_size = 2;
		}
		$add_args = $args['add_args'];
		$r = '';
		$page_links = array();
		$dots = false;

		if ( $args['prev_next'] && $current && 1 < $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current - 1, $link );
			if ( $add_args )
				$link = add_query_arg( $add_args, $link );
			$link .= $args['add_fragment'];

			/**
			 * Filters the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			$page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
		endif;
		for ( $n = 1; $n <= $total; $n++ ) :
			if ( $n == $current ) :
				$page_links[] = "<span aria-current='" . esc_attr( $args['aria_current'] ) . "' class='page-number current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
				$dots = true;
			else :
				if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
					$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
					$link = str_replace( '%#%', $n, $link );
					if ( $add_args )
						$link = add_query_arg( $add_args, $link );
					$link .= $args['add_fragment'];

					/** This filter is documented in wp-includes/general-template.php */
					$page_links[] = "<a class='page-number' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
					$dots = true;
				elseif ( $dots && ! $args['show_all'] ) :
					$page_links[] = '<span class="page-number dots">' . __( '&hellip;' ) . '</span>';
					$dots = false;
				endif;
			endif;
		endfor;
		if ( $args['prev_next'] && $current && $current < $total ) :
			$link = str_replace( '%_%', $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current + 1, $link );
			if ( $add_args )
				$link = add_query_arg( $add_args, $link );
			$link .= $args['add_fragment'];

			/** This filter is documented in wp-includes/general-template.php */
			$page_links[] = '<a class="next page-number" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
		endif;
		switch ( $args['type'] ) {
			case 'array' :
				return $page_links;

			case 'list' :
				$r .= "<ul class='page-number'>\n\t<li>";
				$r .= join("</li>\n\t<li>", $page_links);
				$r .= "</li>\n</ul>\n";
				break;

			default :
				$r = join("\n", $page_links);
				break;
		}
		//return $r;
		echo sprintf($template, $r);
	}
}

/*
 * 自定义导航添加搜索按钮
 * */
if(!function_exists("bmqynext_wp_nav_menu")){
	function bmqynext_wp_nav_menu($args=[]){
		static $menu_id_slugs = array();

		$defaults = array( 'menu' => '', 'container' => 'div', 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
		                   'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '%3$s', 'item_spacing' => 'preserve',
		                   'depth' => 0, 'walker' => '', 'theme_location' => '' );

		$args = wp_parse_args( $args, $defaults );

		if ( ! in_array( $args['item_spacing'], array( 'preserve', 'discard' ), true ) ) {
			// invalid value, fall back to default.
			$args['item_spacing'] = $defaults['item_spacing'];
		}

		/**
		 * Filters the arguments used to display a navigation menu.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param array $args Array of wp_nav_menu() arguments.
		 */
		$args = apply_filters( 'wp_nav_menu_args', $args );
		$args = (object) $args;

		/**
		 * Filters whether to short-circuit the wp_nav_menu() output.
		 *
		 * Returning a non-null value to the filter will short-circuit
		 * wp_nav_menu(), echoing that value if $args->echo is true,
		 * returning that value otherwise.
		 *
		 * @since 3.9.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string|null $output Nav menu output to short-circuit with. Default null.
		 * @param stdClass    $args   An object containing wp_nav_menu() arguments.
		 */
		$nav_menu = apply_filters( 'pre_wp_nav_menu', null, $args );

		if ( null !== $nav_menu ) {
			if ( $args->echo ) {
				echo $nav_menu;
				return;
			}

			return $nav_menu;
		}

		// Get the nav menu based on the requested menu
		$menu = wp_get_nav_menu_object( $args->menu );

		// Get the nav menu based on the theme_location
		if ( ! $menu && $args->theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) )
			$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );

		// get the first menu that has items if we still can't find a menu
		if ( ! $menu && !$args->theme_location ) {
			$menus = wp_get_nav_menus();
			foreach ( $menus as $menu_maybe ) {
				if ( $menu_items = wp_get_nav_menu_items( $menu_maybe->term_id, array( 'update_post_term_cache' => false ) ) ) {
					$menu = $menu_maybe;
					break;
				}
			}
		}

		if ( empty( $args->menu ) ) {
			$args->menu = $menu;
		}

		// If the menu exists, get its items.
		if ( $menu && ! is_wp_error($menu) && !isset($menu_items) )
			$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );

		/*
		 * If no menu was found:
		 *  - Fall back (if one was specified), or bail.
		 *
		 * If no menu items were found:
		 *  - Fall back, but only if no theme location was specified.
		 *  - Otherwise, bail.
		 */
		if ( ( !$menu || is_wp_error($menu) || ( isset($menu_items) && empty($menu_items) && !$args->theme_location ) )
		     && isset( $args->fallback_cb ) && $args->fallback_cb && is_callable( $args->fallback_cb ) )
			return call_user_func( $args->fallback_cb, (array) $args );

		if ( ! $menu || is_wp_error( $menu ) )
			return false;

		$nav_menu = $items = '';

		$show_container = false;
		if ( $args->container ) {
			/**
			 * Filters the list of HTML tags that are valid for use as menu containers.
			 *
			 * @since 3.0.0
			 *
			 * @param array $tags The acceptable HTML tags for use as menu containers.
			 *                    Default is array containing 'div' and 'nav'.
			 */
			$allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
			if ( is_string( $args->container ) && in_array( $args->container, $allowed_tags ) ) {
				$show_container = true;
				$class = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="menu-'. $menu->slug .'-container"';
				$id = $args->container_id ? ' id="' . esc_attr( $args->container_id ) . '"' : '';
				$nav_menu .= '<'. $args->container . $id . $class . '>';
			}
		}

		// Set up the $menu_item variables
		_wp_menu_item_classes_by_context( $menu_items );

		$sorted_menu_items = $menu_items_with_children = array();
		foreach ( (array) $menu_items as $menu_item ) {
			$sorted_menu_items[ $menu_item->menu_order ] = $menu_item;
			if ( $menu_item->menu_item_parent )
				$menu_items_with_children[ $menu_item->menu_item_parent ] = true;
		}

		// Add the menu-item-has-children class where applicable
		if ( $menu_items_with_children ) {
			foreach ( $sorted_menu_items as &$menu_item ) {
				if ( isset( $menu_items_with_children[ $menu_item->ID ] ) )
					$menu_item->classes[] = 'menu-item-has-children';
			}
		}

		unset( $menu_items, $menu_item );

		/**
		 * Filters the sorted list of menu item objects before generating the menu's HTML.
		 *
		 * @since 3.1.0
		 *
		 * @param array    $sorted_menu_items The menu items, sorted by each menu item's menu order.
		 * @param stdClass $args              An object containing wp_nav_menu() arguments.
		 */
		$sorted_menu_items = apply_filters( 'wp_nav_menu_objects', $sorted_menu_items, $args );

		$items .= walk_nav_menu_tree( $sorted_menu_items, $args->depth, $args );
		unset($sorted_menu_items);

		// Attributes
		if ( ! empty( $args->menu_id ) ) {
			$wrap_id = $args->menu_id;
		} else {
			$wrap_id = 'menu-' . $menu->slug;
			while ( in_array( $wrap_id, $menu_id_slugs ) ) {
				if ( preg_match( '#-(\d+)$#', $wrap_id, $matches ) )
					$wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id );
				else
					$wrap_id = $wrap_id . '-1';
			}
		}
		$menu_id_slugs[] = $wrap_id;

		$wrap_class = $args->menu_class ? $args->menu_class : '';

		/**
		 * Filters the HTML list content for navigation menus.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string   $items The HTML list content for the menu items.
		 * @param stdClass $args  An object containing wp_nav_menu() arguments.
		 */
		$items = apply_filters( 'wp_nav_menu_items', $items, $args );
		/**
		 * Filters the HTML list content for a specific navigation menu.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string   $items The HTML list content for the menu items.
		 * @param stdClass $args  An object containing wp_nav_menu() arguments.
		 */
		$items = apply_filters( "wp_nav_menu_{$menu->slug}_items", $items, $args );

		// Don't print any markup if there are no items at this point.
		if ( empty( $items ) )
			return false;

		if(get_option('bmqynext_options_nav_search')==='1'){
			$items .= '<li id="menu-item-search" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-search">'
			          .'<a href="javascript:;" class="popup-trigger">';
			          if(get_option('bmqynext_options_nav_icon')==='1'){
				          $items .= '<i class="menu-item-icon fa fa-search fa-fw"></i> <br />';
			          }
			$items .=  __("Search") .'</a>'
			          .'</li>';
		}
		$nav_menu .= sprintf( $args->items_wrap, esc_attr( $wrap_id ), esc_attr( $wrap_class ), $items );
		unset( $items );

		if ( $show_container )
			$nav_menu .= '</' . $args->container . '>';

		/**
		 * Filters the HTML content for navigation menus.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string   $nav_menu The HTML content for the navigation menu.
		 * @param stdClass $args     An object containing wp_nav_menu() arguments.
		 */
		$nav_menu = apply_filters( 'wp_nav_menu', $nav_menu, $args );

		if ( $args->echo )
			echo $nav_menu;
		else
			return $nav_menu;
	}
}

/*
 * 自定义社交导航
 * */
if(!function_exists("bmqynext_wp_social_menu")){
	function bmqynext_wp_social_menu($args= array(
		'theme_location' => 'social',
		'menu_class'     => 'links-of-author motion-element',
		'container'	=> false,
		'echo'	=> false,
		'items_wrap' => '<div class="%2$s">%3$s</div>',
		'depth'	=> 0,
	) ){
		echo strip_tags(wp_nav_menu( $args ), '<div>,<a>,<i>' );
	}
}

/*
 * 获取标签列表
 * */
function bmqynext_get_the_tag_list( $id=0, $before = '', $after = '' ) {
	$taxonomy = 'post_tag';
	$sep = '';
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	$links = array();

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( is_wp_error( $link ) ) {
			return $link;
		}
		$links[] = '<a href="' . esc_url( $link ) . '" rel="tag">'. $before . $term->name . $after . '</a>';
	}

	/**
	 * Filters the term links for a given taxonomy.
	 *
	 * The dynamic portion of the filter name, `$taxonomy`, refers
	 * to the taxonomy slug.
	 *
	 * @since 2.5.0
	 *
	 * @param array $links An array of term links.
	 */
	$term_links = apply_filters( "term_links-{$taxonomy}", $links );

	return join( $sep, $term_links );
}

/*
 * 压缩html代码
 * */
if(get_option('bmqynext_options_html_compress')==='1'){
	if(!function_exists('wp_compress_html')){
		function wp_compress_html(){
			function wp_compress_html_main ($buffer){
				$initial=strlen($buffer);
				$buffer=explode("<!--wp-compress-html-->", $buffer);
				$count=count ($buffer);
				$buffer_out = '';
				for ($i = 0; $i <= $count; $i++){
					if (stristr($buffer[$i], '<!--wp-compress-html no compression-->')) {
						$buffer[$i]=(str_replace("<!--wp-compress-html no compression-->", " ", $buffer[$i]));
					} else {
						$buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
						$buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
						$buffer[$i]=(str_replace("\n", "", $buffer[$i]));
						$buffer[$i]=(str_replace("\r", "", $buffer[$i]));
						while (stristr($buffer[$i], '  ')) {
							$buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
						}
					}
					$buffer_out.=$buffer[$i];
				}
				$final=strlen($buffer_out);
				$savings=($initial-$final)/$initial*100;
				$savings=round($savings, 2);
				$buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";
				return $buffer_out;
			}
			ob_start("wp_compress_html_main");
		}
		add_action('get_header', 'wp_compress_html');
	}

	if(!function_exists('unCompress')){
		function unCompress($content) {
			if(preg_match_all('/(crayon-|<\/pre>)/i', $content, $matches)) {
				$content = '<!--wp-compress-html--><!--wp-compress-html no compression-->'.$content;
				$content.= '<!--wp-compress-html no compression--><!--wp-compress-html-->';
			}
			return $content;
		}
		add_filter( "the_content", "unCompress");
	}
}

/*
 * 后台启用友情链接管理
 * */
add_filter('pre_option_link_manager_enabled','__return_true');

/*
 * 后台显示更新成功提示信息
 * */
if(!function_exists('bmqynext_show_udpate_success')){
	function bmqynext_show_udpate_success(){
		echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
<p><strong>'. _x('Updated!', 'theme') .'</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">'. __('Dismiss this notice.') .'</span></button></div>';
	}
}

/*
 * 返回站点所有文章分类信息的数组
 * */
if(!function_exists('bmqynext_getCategorysArray')){
	function bmqynext_getCategorysArray() {
		global $wpdb;
		$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
		$request.= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
		$request.= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
		$request.= " ORDER BY term_id asc";
		$categorys = $wpdb->get_results($request);

		$categorysArr = [];

		foreach ($categorys as $category){
			$categorysArr[$category->term_id]= $category->name;
		}

		return $categorysArr;
/*		$output = '<ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">';
		foreach ($categorys as $category) { //调用菜单
			$categoryId = $category->term_id;
			$categoryName = $category->name;
			$output .= '<li id="category-'. $categoryId .'" class="popular-category"><label class="selectit"><input value="'. $categoryId .'" type="checkbox" name="post_category[]" id="in-category-'. $categoryId .'"> '. $categoryName .'</label></li>';
		}
		echo $output .'</ul>';*/
	}
}

/*
 * 后台显示表单项
 * 表单名称
 * 字段信息
 * */
if(!function_exists('bmqynext_generate_form')){
	function bmqynext_generate_form($formName='', $items=[], $action=''){

		if(empty($formName) || !is_array($items)){
			return false;
		}

		$textDomain = wp_get_theme()->get('TextDomain');
		$html = '<form action="'. $action .'" method="post" name="'. $formName .'" novalidate="novalidate">'
		     .'<table class="form-table">';

		foreach($items as $item=>$val){
			if (is_array($items[$item])){
				$siteFiled = [
					'keyword',
					'description'
				];
				$itemArr = $items[$item];
				$field = !in_array($item, $siteFiled) ? $formName .'_'. $item : $item;
				$type = $itemArr['type'];
				$label = __($itemArr['label'], $textDomain);
				$values = !empty($itemArr['values']) ? $itemArr['values'] : null;
				$defaultValue = !empty(get_option($field)) ? get_option($field) : (!empty($itemArr['defaultValue'])?$itemArr['defaultValue']:'');
				$placeholder = !empty($itemArr['placeholder']) ? $itemArr['placeholder'] : '' ;
				$tips = !empty($itemArr['tips']) ? __($itemArr['tips'], $textDomain) : '' ;
				$size = !empty($itemArr['size']) ? $itemArr['size'] : 'regular' ;
				if($size!=='min' && $size!=='small' && $size!=='regular' && $size!=='large'){
					$size = 'regular';
				}
				switch ($type){
					case 'switch':
						$html .= '<tr>
        <th scope="row"><label for="'. $field .'">'. $label .'</label></th>
        <td>
            <fieldset>
                <legend class="screen-reader-text"><span>'. $label .'</span></legend>
                <label for="'. $field .'"><input name="'. $field .'" type="checkbox" id="'. $field .'" value="'. $defaultValue .'" '. checked(get_option($field), true, false) .'>'. $tips .'</label>
            </fieldset>
        </td>
    </tr>';
						break;
					case 'checkbox':
						$opts = '';
						if(!is_array($defaultValue)){
							foreach ($values as $key=>$value) {
								$opts .= '<label><input class="hide-column-tog" name="'. $field .'[]" type="checkbox" id="'. $field .'" value="'. $key .'" '. checked($defaultValue, $key, false) .'>'. $value .'</label>';
							}
						}else{
							foreach ($values as $key=>$value) {
								$opts .= '<label><input class="hide-column-tog" name="'. $field .'[]" type="checkbox" id="'. $field .'" value="'. $key .'" '. (in_array($key, $defaultValue)?' checked':'') .'>'. $value .'</label>';
							}
						}
						$html .= '<tr>
<th scope="row"><label for="'. $field .'">'. $label .'</label></th>
        <td>
        <fieldset class="metabox-prefs">'. $opts .'</fieldset>
        </td>
    </tr>';
						break;
					case 'select':
						$opts = '';
						foreach ($values as $key=>$value){
							$opts .= '<option '. selected($defaultValue, $key, false) .' value="'. $key .'">'. $value .'</option>';
						}
						$html .= '<tr>
        <th scope="row"><label for="'. $field .'">'. $label .'</label></th>
        <td>
	        <select name="'. $field .'" id="'. $field .'">'. $opts .'</select>'. (!empty($tips) ? '<p class="description" id="tagline-description">'. $tips .'</p>' : '') . '
        </td>
    </tr>';
						break;
					case 'input':
						$html .= '<tr>
        <th scope="row"><label for="'. $field .'">'. $label .'</label></th>
        <td><input name="'. $field .'" type="text" id="'. $field .'" placeholder="'. $placeholder .'" value="'. $defaultValue .'" class="'. $size .'-text ltr">'. (!empty($tips) ? '<p class="description" id="tagline-description">'. $tips .'</p>' : '') . '</td>
    </tr>';
						break;
					case 'textarea':
						$html .= '<tr>
            <th scope="row"><label for="'. $field .'">'. $label .'</label></th>
            <td><textarea name="'. $field .'" id="'. $field .'" rows="5" cols="30" class="'. $size .'-text" placeholder="'. $placeholder .'">'. stripslashes($defaultValue) .'</textarea>'. (!empty($tips) ? '<p class="description" id="tagline-description">'. $tips .'</p>' : '') . '</td>
        </tr>';
						break;
				}
			}
		}

		$html .= '</table>'
		     .get_submit_button( __("Save Changes"), "primary", $formName )
		     .'</form>';

		echo $html;
	}
}