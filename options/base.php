<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

$bmqynext_options_base = 'bmqynext_options_base';
$bmqynext_opt_show_logo_name = 'bmqynext_opt_show_logo';

$bmqynext_opt_show_logo_val = get_option( $bmqynext_opt_show_logo_name );
$bmqynext_opt_description_val = get_option( 'description' );
$bmqynext_opt_keyword_val = get_option( 'keyword' );

if ( isset( $_POST[ $bmqynext_options_base ] ) ) {
	$bmqynext_opt_show_logo_val = !empty($_POST[ $bmqynext_opt_show_logo_name ]) ? $_POST[ $bmqynext_opt_show_logo_name ] : 0;
	$bmqynext_opt_description_val = $_POST[ 'description' ];
	$bmqynext_opt_keyword_val = $_POST[ 'keyword' ];

	update_option( $bmqynext_opt_show_logo_name, $bmqynext_opt_show_logo_val );
	update_option( 'description', $bmqynext_opt_description_val );
	update_option( 'keyword', $bmqynext_opt_keyword_val );

	bmqynext_show_udpate_success();
}
?>
<form action="" method="post" name="form1" novalidate="novalidate">
    <table class="form-table">
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Site keyword', 'bmqynext') ?></label></th>
            <td><input name="keyword" type="text" id="keyword" value="<?php echo $bmqynext_opt_keyword_val; ?>" class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle"><?php esc_html_e('Site description', 'bmqynext') ?></label></th>
            <td><textarea name="description" id="description" rows="5" cols="30" class="large-text"><?php echo $bmqynext_opt_description_val; ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_logo_name; ?>"><?php esc_html_e('Home Logo display', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Home Logo display', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_show_logo_name; ?>"><input name="<?php echo $bmqynext_opt_show_logo_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_show_logo_name; ?>" value="1" <?php checked( $bmqynext_opt_show_logo_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?> <?php esc_html_e('(please upload your logo icon in "appearance &gt; Custom &gt; site identity")', 'bmqynext') ?></label>
                </fieldset>
            </td>
        </tr>
    </table>
	<?php submit_button( __('Save Changes'), 'primary', $bmqynext_options_base ); ?>
</form>