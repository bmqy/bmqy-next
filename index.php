<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */

get_header(); ?>
    <div class="main-inner">
        <div class="content-wrap">
            <div id="content" class="content">
                <section id="posts" class="posts-expand">
                    <?php if ( have_posts() ) : ?>

                        <?php if ( is_home() && ! is_front_page() ) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                        <?php endif; ?>

                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );

                            // End the loop.
                        endwhile;

                        // Previous/next page navigation.
	                    bmqynext_pagination();

                    // If no content, include the "No posts found" template.
                    else :
                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
                </section>
            </div>
        </div>
    </div>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
