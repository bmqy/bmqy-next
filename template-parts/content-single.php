<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */
?>

<div id="posts" class="posts-expand">
    <div class="post-block">
        <article id="post-<?php the_ID(); ?>" <?php post_class('post post-type-normal'); ?>>
            <header class="post-header">
                <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="post-meta">
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
            </div><!-- .entry-footer -->

            <?php bmqynext_excerpt(); ?>

            <?php bmqynext_post_thumbnail(); ?>

            <div class="post-body" itemprop="articleBody">
                <?php
                    the_content();

                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bmqynext' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bmqynext' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );

                    if ( '' !== get_the_author_meta( 'description' ) ) {
                        get_template_part( 'template-parts/biography' );
                    }
                ?>
            </div><!-- .entry-content -->
            <?php if(get_option("bmqynext_options_show_copyright")==="1"): ?>
            <div>
                <ul class="post-copyright">
                    <li class="post-copyright-author">
                        <strong><?php _e('Post author:', 'bmqynext') ?></strong>
                        <?php bloginfo('name') ?>
                    </li>
                    <li class="post-copyright-link">
                        <strong><?php _e('Post link:', 'bmqynext') ?></strong>
                        <?php echo get_posts_nav_link() ?>
                        <a href="<?php echo get_permalink() ?>" title="<?php echo the_title() ?>"><?php echo get_permalink() ?></a>
                    </li>
                    <li class="post-copyright-license">
                        <strong><?php _e('Copyright Notice:', 'bmqynext') ?></strong>
                        <?php _e("All articles in this blog are licensed under <a href='https://creativecommons.org/licenses/by-nc-sa/3.0/' rel='external nofollow' target='_blank'>CC BY-NC-SA 3.0</a> unless stating additionally.", 'bmqynext') ?>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
            <footer class="post-footer">
                <div class="post-tags">
                    <?php echo $tags_list = bmqynext_get_the_tag_list( '', '# '); ?>
                </div><!-- .post-tags -->
                <?php if(get_option('bmqynext_options_rating_appid')):?>
                <div class="post-widgets">
                    <?php if(get_option('bmqynext_options_rating_appid')):?>
                    <div class="wp_rating">
                        <div id="wpac-rating"></div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php
                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    bmqynext_get_the_post_navigation( array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'bmqynext' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    bmqynext_get_the_post_navigation( array(
                        'next_text' => '%title <i class="fa fa-chevron-right"></i>',
                        'prev_text' => '<i class="fa fa-chevron-left"></i> %title',
                    ) );
                }
                ?><!-- .post-nav -->
            </footer>
        </article><!-- #post-## -->

        <div class="post-spread">
            <?php if(get_option('bmqynext_options_share_baidu')!==''): ?>
                <?php get_template_part( "template-parts/share/baidushare", "bmqynext-baidu_share" );?>
            <?php elseif(get_option('bmqynext_options_share_jiathis')!==''): ?>
                <?php get_template_part( "template-parts/share/jiathis", "bmqynext-jiathis_share" );?>
            <?php elseif(get_option('bmqynext_options_share_addthis')!==''): ?>
                <?php get_template_part( "template-parts/share/add-this", "bmqynext-add-this_share" );?>
            <?php endif; ?>
        </div>
    </div>
</div>