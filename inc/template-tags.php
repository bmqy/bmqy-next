<?php
/**
 * Custom Twenty Sixteen template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

if(! function_exists('bmqynext_wp_head')){
    function bmqynext_wp_head(){
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
	    do_action('wp_head');
    }
}

if(! function_exists('bmqynext_get_options_keyword')){
    function bmqynext_get_options_keyword(){
        return get_option('keyword');
    }
}

if(! function_exists('bmqynext_get_options_description')){
    function bmqynext_get_options_description(){
        return get_option('description');
    }
}

if ( ! function_exists( 'bmqynext_post_meta' ) ) :
/**
 * 输出文章发布信息
 */
function bmqynext_post_meta() {
    //不显示作者名
/*	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'bmqynext_author_avatar_size', 15 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'bmqynext' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}*/

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		bmqynext_entry_date();

		bmqynext_modify_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'bmqynext' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		bmqynext_entry_taxonomies();
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		printf( "<span class=\"post-comments-count\">" );
		printf( "<span class=\"post-meta-divider\">|</span>" );
		echo '<span class="post-meta-item-icon"><i class="fa fa-comment-o"></i> </span>';
		bmqynext_comments_popup_link();
		echo '</span>';
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'bmqynext_entry_date' ) ) :
/**
 * 输出文章发布时间
 */
function bmqynext_entry_date() {
	$time_string = '<span class="post-meta-item-icon"><i class="fa fa-calendar-o"></i> </span><span class="post-meta-item-text">%1$s  </span><time itemprop="dateCreated datePublished" title="%1$s" datetime="%3$s">%3$s</time>';

	printf( $time_string,
		_x( 'Posted on', 'Used before publish date.', 'bmqynext' ),
		esc_attr( get_the_date( 'c' ) ),
		get_the_date()
	);
}
endif;

if ( ! function_exists( 'bmqynext_modify_date' ) ) :
/**
 * 输出文章更新时间
 */
function bmqynext_modify_date() {
    if(get_post_time('U') !== get_post_modified_time('U')){
	    printf( "<span class=\"post-meta-divider\">|</span>" );
        $time_string = '<span class="post-meta-item-icon"><i class="fa fa-calendar-check-o"></i> </span><span class="post-meta-item-text">%1$s  </span><time class="updated" title="%1$s" datetime="%3$s">%3$s</time>';

        printf( $time_string,
            _x( 'Modify on', 'Used before modify date.', 'bmqynext' ),
            esc_attr( get_the_modified_date( 'c' ) ),
            get_the_modified_date()
        );
    }
}
endif;

if ( ! function_exists( 'bmqynext_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 */
function bmqynext_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'bmqynext' ) );
	if ( $categories_list && bmqynext_categorized_blog() ) {
		printf( '<span class="post-category"><span class="post-meta-divider">|</span><span class="post-meta-item-icon"><i class="fa fa-folder-o"></i> </span><span class="post-meta-item-text">%1$s </span>%2$s</span>',
			_x( 'Categories By', 'By category names.', 'bmqynext' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'bmqynext' ) );
	if ( $tags_list && ! is_wp_error( $tags_list ) ) {
		printf( '<span class="tags-links"><span class="post-meta-divider">|</span><span class="post-meta-item-icon"><i class="fa fa-tags"></i> </span><span class="post-meta-item-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'bmqynext' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'bmqynext_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 */
function bmqynext_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'bmqynext_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 */
	function bmqynext_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'bmqynext_excerpt_more' ) && ! is_admin() ) :
function bmqynext_excerpt_more() {
	$link = sprintf( '<div class="post-button text-center"><a class="btn" href="%1$s" title="%2$s"  rel="nofollow">%3$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		get_the_title( get_the_ID() ),
		/* translators: %s: Name of current post */
		__( 'Read more', 'bmqynext' )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'bmqynext_excerpt_more' );
endif;

if ( ! function_exists( 'bmqynext_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 */
function bmqynext_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bmqynext_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bmqynext_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 || is_preview() ) {
		// This blog has more than 1 category so bmqynext_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bmqynext_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flushes out the transients used in bmqynext_categorized_blog().
 */
function bmqynext_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bmqynext_categories' );
}
add_action( 'edit_category', 'bmqynext_category_transient_flusher' );
add_action( 'save_post',     'bmqynext_category_transient_flusher' );

/*
 * 首页是否启用logo显示
 * */
if(!function_exists('bmqynext_enabled_custom_logo')){
    function bmqynext_enabled_custom_logo(){
        return (has_custom_logo() && get_option('bmqynext_opt_show_logo')==='1');
    }
}

/*
 * Aside显示logo
 * */
if ( ! function_exists( 'bmqynext_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 */
function bmqynext_the_custom_logo($blog_id = 0) {
	$html = '';
	$switched_blog = false;

	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
		switch_to_blog( $blog_id );
		$switched_blog = true;
	}

	$custom_logo_id = get_theme_mod( 'custom_logo' );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class'    => 'site-author-image',
			'itemprop' => 'logo',
		);

		/*
		 * If the logo alt attribute is empty, get the site title and explicitly
		 * pass it to the attributes used by wp_get_attachment_image().
		 */
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		/*
		 * If the alt attribute is not empty, there's no need to explicitly pass
		 * it because wp_get_attachment_image() already adds the alt attribute.
		 */
		$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
		);
	}

	// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
    elseif ( is_customize_preview() ) {
		$html = sprintf( '<a href="%1$s" class="custom-logo-link" style="display:none;"><img class="custom-logo"/></a>',
			esc_url( home_url( '/' ) )
		);
	}

	if ( $switched_blog ) {
		restore_current_blog();
	}

	/**
	 * Filters the custom logo output.
	 *
	 * @since 4.5.0
	 * @since 4.6.0 Added the `$blog_id` parameter.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	echo apply_filters( 'get_custom_logo', $html, $blog_id );
}
endif;

/*
 * 首页显示logo
 * */
if(!function_exists('bmqynext_get_custrom_logo')){
    function bmqynext_get_custrom_logo(){
	    $custom_logo_id = get_theme_mod( 'custom_logo' );
	    $custom_logo_attr = array(
	            'class' => 'custom-logo-image',
                'alt' => get_bloginfo('name')
        );
        return wp_get_attachment_image( $custom_logo_id, array('auto','120'), false, $custom_logo_attr );
    }
}

/*
 * 获取已发布日志数量
 * */
if(!function_exists('bmqynext_get_posts_count')){
    function bmqynext_get_posts_count(){
        return wp_count_posts()->publish;
    }
}

/*
 * 获取已发布分类数量
 * */
if(!function_exists('bmqynext_get_categorys_count')){
    function bmqynext_get_categorys_count(){
	    return wp_count_terms('category');
    }
}

/*
 * 获取已发布标签数量
 * */
if(!function_exists('bmqynext_get_targs_count')){
    function bmqynext_get_targs_count(){
	    return wp_count_terms('post_tag');
        //return wp_tag_cloud();
    }
}

/*
 * 获取上一篇/下一篇
 * */

function bmqynext_navigation_markup( $links, $class = 'posts-navigation', $screen_reader_text = '' ) {
	if ( empty( $screen_reader_text ) ) {
		$screen_reader_text = __( 'Posts navigation' );
	}

	$template = '
	<div class="post-nav %1$s" role="navigation">
		%3$s
	</div>';

	/**
	 * Filters the navigation markup template.
	 *
	 * Note: The filtered template HTML must contain specifiers for the navigation
	 * class (%1$s), the screen-reader-text value (%2$s), and placement of the
	 * navigation links (%3$s):
	 *
	 *     <nav class="navigation %1$s" role="navigation">
	 *         <h2 class="screen-reader-text">%2$s</h2>
	 *         <div class="nav-links">%3$s</div>
	 *     </nav>
	 *
	 * @since 4.4.0
	 *
	 * @param string $template The default template.
	 * @param string $class    The class passed by the calling function.
	 * @return string Navigation template.
	 */
	$template = apply_filters( 'navigation_markup_template', $template, $class );

	return sprintf( $template, sanitize_html_class( $class ), esc_html( $screen_reader_text ), $links );
}
function bmqynext_get_the_post_navigation( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'prev_text'          => '%title',
		'next_text'          => '%title',
		'in_same_term'       => false,
		'excluded_terms'     => '',
		'taxonomy'           => 'category',
		'screen_reader_text' => __( 'Post navigation' ),
	) );

	$navigation = '';

	$previous = get_previous_post_link(
		'<div class="post-nav-prev post-nav-item">%link</div>',
		$args['prev_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	$next = get_next_post_link(
		'<div class="post-nav-next post-nav-item">%link</div>',
		$args['next_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		$navigation = bmqynext_navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

	echo $navigation;
}