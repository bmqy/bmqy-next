<?php
/**
 * The template for displaying pages
 * *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */

get_header(); ?>
    <div class="main-inner">
        <div class="content-wrap">
            <div id="content" class="content">
                <div class="post-block tag">
                    <?php if ( is_tag() ) : ?>
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
                            <header class="post-header">
                                <h1 class="post-title" itemprop="name headline"></h1>
                            </header>
                            <div class="tag-cloud">
                                <div class="tag-cloud-title">
                                    <?php echo sprintf(__('There are currently %s labels.', 'bmqynext'), bmqynext_get_targs_count()) ?>
                                </div>
                                <div class="tag-cloud-tags">
                                    <?php
                                    wp_tag_cloud([
                                        'smallest' => 8,
                                        'largest' => 22,
                                        'number' => 200
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>

        </div><!-- .site-main -->

        <?php get_sidebar( 'content-bottom' ); ?>

    </div><!-- .content-area -->
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
