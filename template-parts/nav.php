<?php
/**
 * The template for displaying the nav
 *
 * @package WordPress
 * @subpackage bmqy.next
 * @since bmqy.next 1.0
 */

?>
<li class="menu-item menu-item-home <?php echo is_home()?' menu-item-active':'' ?>">
    <a href="<?php echo get_option('bmqynext_options_nav_home_link')?get_option('bmqynext_options_nav_home_link'):'/' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_home_icon')?get_option('bmqynext_options_nav_home_icon'):' fa-home' ?>"></i><br><?php echo get_option('bmqynext_options_nav_home_text')?get_option('bmqynext_options_nav_home_text'):'首页' ?></a>
</li>
<li class="menu-item menu-item-home <?php echo is_category()?' menu-item-active':'' ?>">
    <a href="<?php echo get_option('bmqynext_options_nav_category_link')?get_option('bmqynext_options_nav_category_link'):'/category/' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_category_icon')?get_option('bmqynext_options_nav_category_icon'):' fa-th' ?>"></i><br><?php echo get_option('bmqynext_options_nav_category_text')?get_option('bmqynext_options_nav_category_text'):'分类' ?></a>
</li>
<li class="menu-item menu-item-home">
    <a href="<?php echo get_option('bmqynext_options_nav_about_link')?get_option('bmqynext_options_nav_about_link'):'/about/' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_about_icon')?get_option('bmqynext_options_nav_about_icon'):' fa-user' ?>"></i><br><?php echo get_option('bmqynext_options_nav_about_text')?get_option('bmqynext_options_nav_about_text'):'关于' ?></a>
</li>
<li class="menu-item menu-item-home <?php echo is_archive()?' menu-item-active':'' ?>">
    <a href="<?php echo get_option('bmqynext_options_nav_archives_link')?get_option('bmqynext_options_nav_archives_link'):'/archives/' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_archives_icon')?get_option('bmqynext_options_nav_archives_icon'):' fa-archive' ?>"></i><br><?php echo get_option('bmqynext_options_nav_archives_text')?get_option('bmqynext_options_nav_archives_text'):'归档' ?></a>
</li>
<li class="menu-item menu-item-home <?php echo is_tag()?' menu-item-active':'' ?>">
    <a href="<?php echo get_option('bmqynext_options_nav_tag_link')?get_option('bmqynext_options_nav_tag_link'):'/tag/' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_tag_icon')?get_option('bmqynext_options_nav_tag_icon'):' fa-tag' ?>"></i><br><?php echo get_option('bmqynext_options_nav_tag_text')?get_option('bmqynext_options_nav_tag_text'):'标签' ?></a>
</li>
<li class="menu-item menu-item-home">
    <a href="<?php echo get_option('bmqynext_options_nav_sitemap_link')?get_option('bmqynext_options_nav_sitemap_link'):'/sitemap.xml' ?>"><i class="menu-item-icon fa fa-fw <?php echo get_option('bmqynext_options_nav_sitemap_icon')?get_option('bmqynext_options_nav_sitemap_icon'):' fa-sitemap' ?>"></i><br><?php echo get_option('bmqynext_options_nav_home_text')?get_option('bmqynext_options_nav_sitemap_text'):'站点地图' ?></a>
</li>
