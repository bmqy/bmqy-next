<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */

get_header(); ?>

<div class="main-inner">
    <div class="content-wrap">
        <div id="content" class="content">
            <div id="posts" class="posts-expand">
                <header class="page-header">
                    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bmqynext' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'bmqynext' ); ?></p>

                    <?php bmqynext_get_search_form(); ?>
                </div><!-- .page-content -->
                <?php get_sidebar( 'content-bottom' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>