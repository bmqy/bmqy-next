<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */
?>

<?php
$navMenu = array(
	'icon' => array(
		'type' => 'checkbox',
		'label' => 'Icon',
	),
	'home_text' => array(
		'type' => 'input',
		'label' => 'Home',
		'placeholder' => '链接文本，默认：首页',
	),
	'home_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/',
	),
	'home_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-home',
	),
	'category_text' => array(
		'type' => 'input',
		'label' => 'Category',
		'placeholder' => '链接文本，默认：分类',
	),
	'category_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/category/',
	),
	'category_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-th',
	),
	'about_text' => array(
		'type' => 'input',
		'label' => 'About',
		'placeholder' => '链接文本，默认：关于',
	),
	'about_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/about/',
	),
	'about_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-user',
	),
	'archives_text' => array(
		'type' => 'input',
		'label' => 'Archives',
		'placeholder' => '链接文本，默认：归档',
	),
	'archives_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/archives/',
	),
	'archives_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-archive',
	),
	'tag_text' => array(
		'type' => 'input',
		'label' => 'Tag',
		'placeholder' => '链接文本，默认：标签',
	),
	'tag_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/tag/',
	),
	'tag_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-tags',
	),
	'sitemap_text' => array(
		'type' => 'input',
		'label' => 'Sitemap',
		'placeholder' => '链接文本，默认：站点地图',
	),
	'sitemap_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址，默认：/sitemap.xml',
	),
	'sitemap_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-sitemap',
	)
);

$bmqynext_options_menu = 'bmqynext_options_menu';
$bmqynext_opt_show_nav_icon_name = 'bmqynext_opt_show_nav_icon';
$bmqynext_opt_show_nav_icon_val = get_option( $bmqynext_opt_show_nav_icon_name );
$bmqynext_opt_nav_home_name = 'bmqynext_opt_nav_home';
$bmqynext_opt_nav_home_val = get_option( $bmqynext_opt_nav_home_name );
$bmqynext_opt_nav_category_name = 'bmqynext_opt_nav_category';
$bmqynext_opt_nav_category_val = get_option( $bmqynext_opt_nav_category_name );
$bmqynext_opt_nav_about_name = 'bmqynext_opt_nav_about';
$bmqynext_opt_nav_about_val = get_option( $bmqynext_opt_nav_about_name );
$bmqynext_opt_nav_archives_name = 'bmqynext_opt_nav_archives';
$bmqynext_opt_nav_archives_val = get_option( $bmqynext_opt_nav_archives_name );
$bmqynext_opt_nav_tag_name = 'bmqynext_opt_nav_tag';
$bmqynext_opt_nav_tag_val = get_option( $bmqynext_opt_nav_tag_name );
$bmqynext_opt_nav_sitemap_name = 'bmqynext_opt_nav_sitemap';
$bmqynext_opt_nav_sitemap_val = get_option( $bmqynext_opt_nav_sitemap_name );
$bmqynext_opt_nav_search_name = 'bmqynext_opt_nav_search';
$bmqynext_opt_nav_search_val = get_option( $bmqynext_opt_nav_search_name );

$bmqynext_opt_show_social_icon_name = 'bmqynext_opt_show_social_icon';
$bmqynext_opt_show_social_icon_val = get_option( $bmqynext_opt_show_social_icon_name );
$bmqynext_opt_social_weibo_name = 'bmqynext_opt_social_weibo';
$bmqynext_opt_social_weibo_val = get_option( $bmqynext_opt_social_weibo_name );
$bmqynext_opt_social_google_name = 'bmqynext_opt_social_google';
$bmqynext_opt_social_google_val = get_option( $bmqynext_opt_social_google_name );
$bmqynext_opt_social_facebook_name = 'bmqynext_opt_social_facebook';
$bmqynext_opt_social_facebook_val = get_option( $bmqynext_opt_social_facebook_name );
$bmqynext_opt_social_twitter_name = 'bmqynext_opt_social_twitter';
$bmqynext_opt_social_twitter_val = get_option( $bmqynext_opt_social_twitter_name );
$bmqynext_opt_social_github_name = 'bmqynext_opt_social_github';
$bmqynext_opt_social_github_val = get_option( $bmqynext_opt_social_github_name );
$bmqynext_opt_social_google_name = 'bmqynext_opt_social_google';
$bmqynext_opt_social_google_val = get_option( $bmqynext_opt_social_google_name );
$bmqynext_opt_social_facebook_name = 'bmqynext_opt_social_facebook';
$bmqynext_opt_social_facebook_val = get_option( $bmqynext_opt_social_facebook_name );
$bmqynext_opt_social_twitter_name = 'bmqynext_opt_social_twitter';
$bmqynext_opt_social_twitter_val = get_option( $bmqynext_opt_social_twitter_name );

if ( isset( $_POST[ $bmqynext_options_menu ] ) ) {
	$bmqynext_opt_show_nav_icon_val = !empty($_POST[ $bmqynext_opt_show_nav_icon_name ]) ? $_POST[ $bmqynext_opt_show_nav_icon_name ] : 0;
	$bmqynext_opt_show_social_icon_val = !empty($_POST[ $bmqynext_opt_show_social_icon_name ]) ? $_POST[ $bmqynext_opt_show_social_icon_name ] : 0;

	update_option( $bmqynext_opt_show_nav_icon_name, $bmqynext_opt_show_nav_icon_val );
	update_option( $bmqynext_opt_show_social_icon_name, $bmqynext_opt_show_social_icon_val );

	bmqynext_show_udpate_success();
}

bmqynext_generate_form('options_nav', $navMenu);

?>