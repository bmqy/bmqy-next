<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

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
?>
<form action="" method="post" name="form1" novalidate="novalidate">
    <table class="form-table">
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_nav_icon_name; ?>"><?php esc_html_e('Nav Icon', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Nav Icon', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_show_nav_icon_name; ?>"><input name="<?php echo $bmqynext_opt_show_nav_icon_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_show_nav_icon_name; ?>" value="1" <?php checked( $bmqynext_opt_show_nav_icon_val ); ?> /></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Home', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_home_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_home_name; ?>" value="<?php echo $bmqynext_opt_nav_home_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Category', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_category_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_category_name; ?>" value="<?php echo $bmqynext_opt_nav_category_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('About', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_about_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_about_name; ?>" value="<?php echo $bmqynext_opt_nav_about_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Archives', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_archives_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_archives_name; ?>" value="<?php echo $bmqynext_opt_nav_archives_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Tag', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_tag_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_tag_name; ?>" value="<?php echo $bmqynext_opt_nav_tag_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Sitemap', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_sitemap_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_sitemap_name; ?>" value="<?php echo $bmqynext_opt_nav_sitemap_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Search', 'bmqynext') ?></label></th>
            <td><input name="<?php echo $bmqynext_opt_nav_search_name; ?>" type="text" id="<?php echo $bmqynext_opt_nav_search_name; ?>" value="<?php echo $bmqynext_opt_nav_search_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_social_icon_name; ?>"><?php esc_html_e('Social Icon', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Social Icon', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_show_social_icon_name; ?>"><input name="<?php echo $bmqynext_opt_show_social_icon_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_show_social_icon_name; ?>" value="1" <?php checked( $bmqynext_opt_show_social_icon_val ); ?> /></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Weibo', 'bmqynext') ?></label></th>
            <td><input name="keyword" type="text" id="keyword" value="<?php echo $bmqynext_opt_keyword_val; ?>" class="regular-text ltr"/></td>
        </tr>
    </table>
	<?php submit_button( __('Save Changes'), 'primary', $bmqynext_options_menu ); ?>
</form>