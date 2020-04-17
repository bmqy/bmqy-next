<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-type-normal"); ?>>
    <div class="post-block">
        <header class="post-header">
		    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <span class="sticky-post"><?php _e( 'Featured', 'bmqynext' ); ?></span>
		    <?php endif; ?>

		    <?php the_title( sprintf( '<h1 class="post-title"><a class="post-title-link" href="%s" itemprop="url" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            <div class="post-meta">
			    <?php bmqynext_post_meta(); ?>
			    <?php
			    bmqynext_edit_post_link(
				    sprintf(
				    /* translators: %s: Name of current post */
					    __( 'Edit', 'bmqynext' ),
					    get_the_title()
				    ),
				    '<span class="edit-link"><span class="post-meta-divider">|</span><span class="post-meta-item-icon"><i class="fa fa-pencil-square-o"
></i> </span>',
				    '</span>'
			    );
			    ?>
            </div><!-- .entry-footer -->
        </header><!-- .entry-header -->

	    <?php //bmqynext_excerpt(); ?>

	    <?php //bmqynext_post_thumbnail(); ?>

        <div class="post-body" itemprop="articleBody">
		    <?php
		    the_excerpt();

		    wp_link_pages( array(
			    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bmqynext' ) . '</span>',
			    'after'       => '</div>',
			    'link_before' => '<span>',
			    'link_after'  => '</span>',
			    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bmqynext' ) . ' </span>%',
			    'separator'   => '<span class="screen-reader-text">, </span>',
		    ) );
		    ?>
        </div><!-- .entry-content -->

        <footer class="post-footer">
            <div class="post-eof"></div>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
