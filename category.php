<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="main-inner">
    <div class="content-wrap">
        <div id="content" class="content">
	        <?php if ( is_category() ) : ?>
                <section id="posts" <?php post_class("posts-collapse"); ?>>
                    <div class="collection-title">
                        <?php
                        bmqynext_archive_title( '<h1>', '</h1>' );
                        //the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </div><!-- .page-header -->

                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/category', get_post_format() );

                        // End the loop.
                    endwhile;

                    // Previous/next page navigation.
	                bmqynext_pagination();
            ?>
                </section>
            <?php else : ?>
                <div id="posts" class="posts-expand">
                    <div class="category-all-page">
                        <div class="category-all-title">
                            <?php echo sprintf(__('There are currently %s classifications.', 'bmqynext'), bmqynext_get_categorys_count()) ?>
                        </div>
                        <div class="category-all">
                            <ul class="category-list">
	                            <?php
	                            bmqynext_categories_list();
	                            ?>
                            </ul>
                        </div>
                    </div>
	                <?php

	                if ( comments_open() || get_comments_number() ) {
		                comments_template();
	                }
	                ?>
                </div>
            <?php endif;?>
        </div>

	</div><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
