<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if(true)://if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    <div class="sidebar-toggle">
        <div class="sidebar-toggle-line-wrap">
            <span class="sidebar-toggle-line sidebar-toggle-line-first"></span>
            <span class="sidebar-toggle-line sidebar-toggle-line-middle"></span>
            <span class="sidebar-toggle-line sidebar-toggle-line-last"></span>
        </div>
    </div>
	<aside id="sidebar" class="sidebar widget-area" role="complementary">
        <div class="sidebar-inner">
            <?php get_template_part( 'template-parts/author', 'author' ); ?>
            <?php get_template_part( 'template-parts/postsinfo', 'postsinfo' ); ?>
            <?php get_template_part( 'template-parts/rss', 'rss' ); ?>
            <?php get_template_part( 'template-parts/social', 'social' ); ?>
            <?php get_template_part( 'template-parts/friendslink', 'friendslink' ); ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
