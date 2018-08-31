<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage bmqy.next
 * @since bmqy.next 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Disable Baidu tranformation -->
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	<?php if(false): ?>
    <!-- google_site_verification -->
    <meta name="google-site-verification" content="{{ theme.google_site_verification }}" />
    <!-- yandex_site_verification -->
    <meta name="yandex-verification" content="{{ theme.yandex_site_verification }}" />
    <!-- baidu_site_verification -->
    <meta name="baidu-site-verification" content="{{ theme.baidu_site_verification }}" />
    <!-- qihu_site_verification -->
    <meta name="360-site-verification" content="{{ theme.qihu_site_verification }}" />
	<?php endif; ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php bmqynext_wp_head() ?>
    <meta name="keywords" content="<?php echo bmqynext_get_options_keyword() ?>">
    <meta name="description" content="<?php echo bmqynext_get_options_description() ?>">
    <?php if(false): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/css/eevee.css" ?>">
    <?php endif; ?>
    <!-- Export some HEXO Configurations to Front-End -->
    <script type="text/javascript" id="hexo.configurations">
        var NexT = window.NexT || {},
        CONFIG = {
            root: "/",
            scheme: "Muse",
            sidebar: {position: "left", display: "post", offset: 12, offset_float: 0, b2t: !1, scrollpercent: !1},
            fancybox: !0,
            motion: !0,
            duoshuo: {userId: "0", author: "博主"},
            algolia: {
                applicationID: "",
                apiKey: "",
                indexName: "",
                hits: {per_page: 10},
                labels: {
                    input_placeholder: "Search for Posts",
                    hits_empty: "We didn't find any results for the search: ${query}",
                    hits_stats: "${hits} results found in ${time} ms"
                }
            }
        }
    </script>
</head>

<body <?php body_class(); ?>>
<div class="container">
    <div class="headband"></div>
    <header id="header" class="header" itemscope itemtype="http://schema.org/WPHeader">
        <div class="header-inner">
            <div class="site-brand-wrapper">
                <div class="site-meta <?php echo bmqynext_enabled_custom_logo()?'custom-logo':'' ?>">
                    <?php
                    if(bmqynext_enabled_custom_logo()):
                    ?>
                    <div class="site-meta-headline">
                        <a>
                            <?php echo bmqynext_get_custrom_logo() ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <div class="custom-logo-site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  class="brand" rel="start">
                            <span class="logo-line-before"><i></i></span>
                            <span class="site-title"><?php bloginfo("name") ?></span>
                            <span class="logo-line-after"><i></i></span>
                        </a>
                    </div>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <p class="site-subtitle"><?php bloginfo("description") ?></p>
                    <?php endif; ?>
                </div>

	            <?php if ( is_user_logged_in() ) : ?>
                <div class="site-nav-toggle" style="top: 56px;">
                <?php else: ?>
                <div class="site-nav-toggle">
                <?php endif; ?>
                    <button>
                        <span class="btn-bar"></span>
                        <span class="btn-bar"></span>
                        <span class="btn-bar"></span>
                    </button>
                </div>
            </div>

            <?php if ( is_user_logged_in() ) : ?>
            <div class="site-nav" style="top: 104px;">
            <?php else: ?>
            <nav class="site-nav">
            <?php endif; ?>
	            <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
                    <ul id="menu" class="menu">
			            <?php
                        if(get_option('enabled_wordpress_nav')):
                            if ( has_nav_menu( 'primary' ) ) :
                        ?>
                            <li class="menu-item menu-item-<?php esc_attr_e( 'Primary Menu', 'bmqynext' ); ?>">
					            <?php
					            bmqynext_wp_nav_menu( array(
						            'theme_location' => 'primary',
						            'menu_class'     => 'primary-menu',
					            ) );
					            ?>
                            </li><!-- .main-navigation -->
<!--
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-search">
                                <a href="javascript:;" class="popup-trigger">
                                    <i class="menu-item-icon fa fa-search fa-fw"></i> <br /><?php /*echo __("Search")*/?>
                                </a>
                            </li>-->
			            <?php
                            endif;
                        else:
                        ?>
	                        <?php get_template_part('template-parts/nav', 'bmqynext-nav')?>
                        <?php
                        endif;
		                ?>
                    </ul><!-- .site-header-menu -->

                    <div class="site-search">
                        <div class="popup search-popup local-search-popup">
                            <div class="local-search-header clearfix">
                                <span class="search-icon">
                                  <i class="fa fa-search"></i>
                                </span>
                                <span class="popup-btn-close">
                                  <i class="fa fa-times-circle"></i>
                                </span>
                                <div class="local-search-input-wrapper">
                                    <input autocomplete="off" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bmqynext' ); ?>" spellcheck="false" type="text" id="local-search-input">
                                </div>
                            </div>
                            <div id="local-search-result"></div>
                        </div>
                    </div>
	            <?php endif; ?>
            </nav>
        </div>
    </header>

    <main id="main" class="main">