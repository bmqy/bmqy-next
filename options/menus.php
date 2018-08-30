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
		'name' => 'Nav Icon',
	),
	'home' => array(
		'type' => 'input',
		'name' => 'Home',
		'placeholder' => '请输入图标',
		'tips' => '设置显示的图标',
	),
	'category' => array(
		'type' => 'input',
		'name' => 'Category',
	),
	'about' => array(
		'type' => 'input',
		'name' => 'About',
	),
	'archives' => array(
		'type' => 'input',
		'name' => 'Archives',
	),
	'tag' => array(
		'type' => 'input',
		'name' => 'Tag',
	),
	'sitemap' => array(
		'type' => 'input',
		'name' => 'Sitemap',
	)
);
$socialMenu = array(
	'icon' => array(
		'type' => 'checkbox',
		'name' => 'Social Icon',
	),
	'weibo' => array(
		'type' => 'input',
		'name' => 'Weibo',
	),
	'zhihu' => array(
		'type' => 'input',
		'name' => 'Zhihu',
	),
	'github' => array(
		'type' => 'input',
		'name' => 'Github',
	),
	'google' => array(
		'type' => 'input',
		'name' => 'Google',
	),
	'twitter' => array(
		'type' => 'input',
		'name' => 'Twitter',
	),
	'facebook' => array(
		'type' => 'input',
		'name' => 'Facebook',
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

bmqynext_generate_form('options_social', $socialMenu);
?>