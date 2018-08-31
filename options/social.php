<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */
?>

<?php
$socialMenu = array(
	'icon' => array(
		'type' => 'checkbox',
		'label' => 'Social Icon',
	),
	'weibo_text' => array(
		'type' => 'input',
		'label' => 'Weibo',
		'placeholder' => '链接文本，默认：微博',
	),
	'weibo_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'weibo_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-weibo',
	),
	'zhihu_text' => array(
		'type' => 'input',
		'label' => 'Zhihu',
		'placeholder' => '链接文本，默认：知乎',
	),
	'zhihu_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'zhihu_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-weibo',
	),
	'github_text' => array(
		'type' => 'input',
		'label' => 'Github',
		'placeholder' => '链接文本，默认：Github',
	),
	'github_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'github_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-github',
	),
	'google_text' => array(
		'type' => 'input',
		'label' => 'Google',
		'placeholder' => '链接文本，默认：Google',
	),
	'google_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'google_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-google',
	),
	'twitter_text' => array(
		'type' => 'input',
		'label' => 'Twitter',
		'placeholder' => '链接文本，默认：Twitter',
	),
	'twitter_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'twitter_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-twitter',
	),
	'facebook_text' => array(
		'type' => 'input',
		'label' => 'Facebook',
		'placeholder' => '链接文本，默认：Facebook',
	),
	'facebook_link' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '链接地址',
	),
	'facebook_icon' => array(
		'type' => 'input',
		'label' => '',
		'placeholder' => '小图标，默认：fa-facebook',
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

bmqynext_generate_form('options_social', $socialMenu);
?>