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
            <section id="posts" <?php post_class("posts-collapse"); ?>>
                <?php if ( have_posts() ) : ?>
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

                // If no content, include the "No posts found" template.
                else :
                    get_template_part( 'template-parts/category', 'category' );

                endif;
                ?>
            </section>
        </div>

	</div><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
