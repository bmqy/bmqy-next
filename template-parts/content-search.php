<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-block">
        <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header><!-- .entry-header -->

        <?php bmqynext_post_thumbnail(); ?>

        <?php bmqynext_excerpt(); ?>

        <?php if ( 'post' === get_post_type() ) : ?>

            <footer class="entry-footer">
                <?php bmqynext_post_meta(); ?>
                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'bmqynext' ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>
            </footer><!-- .entry-footer -->

        <?php else : ?>

            <?php
                edit_post_link(
                    sprintf(
                        /* translators: %s: Name of current post */
                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'bmqynext' ),
                        get_the_title()
                    ),
                    '<footer class="entry-footer"><span class="edit-link">',
                    '</span></footer><!-- .entry-footer -->'
                );
            ?>

        <?php endif; ?>
    </div>
</article><!-- #post-## -->

