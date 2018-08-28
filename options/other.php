<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

$bmqynext_options_other = 'bmqynext_options_other';
$bmqynext_opt_show_eevee_name = 'bmqynext_opt_show_eevee';
$bmqynext_opt_html_compress_name = 'bmqynext_opt_html_compress';
$bmqynext_opt_mouse_effects_name = 'bmqynext_opt_mouse_effects';
$bmqynext_opt_rss_name = 'bmqynext_opt_rss';
$bmqynext_opt_rss_type_name = 'bmqynext_opt_rss_type';

$bmqynext_opt_show_eevee_val = get_option( $bmqynext_opt_show_eevee_name );
$bmqynext_opt_html_compress_val = get_option( $bmqynext_opt_html_compress_name );
$bmqynext_opt_mouse_effects_val = get_option( $bmqynext_opt_mouse_effects_name );
$bmqynext_opt_rss_val = get_option( $bmqynext_opt_rss_name );
$bmqynext_opt_rss_type_val = !empty(get_option( $bmqynext_opt_rss_type_name )) ? get_option( $bmqynext_opt_rss_type_name ) : 'rss2_url';

if ( isset( $_POST[ $bmqynext_options_other ] ) ) {
	$bmqynext_opt_show_eevee_val = !empty($_POST[ $bmqynext_opt_show_eevee_name ]) ? $_POST[ $bmqynext_opt_show_eevee_name ] : 0;
	$bmqynext_opt_html_compress_val = !empty($_POST[ $bmqynext_opt_html_compress_name ]) ? $_POST[ $bmqynext_opt_html_compress_name ] : 0;
	$bmqynext_opt_mouse_effects_val = !empty($_POST[ $bmqynext_opt_mouse_effects_name ]) ? $_POST[ $bmqynext_opt_mouse_effects_name ] : 0;
	$bmqynext_opt_rss_val = !empty($_POST[ $bmqynext_opt_rss_name ]) ? $_POST[ $bmqynext_opt_rss_name ] : 0;
	$bmqynext_opt_rss_type_val = !empty($_POST[ $bmqynext_opt_rss_type_name ]) ? $_POST[ $bmqynext_opt_rss_type_name ] : 0;

	update_option( $bmqynext_opt_show_eevee_name, $bmqynext_opt_show_eevee_val );
	update_option( $bmqynext_opt_html_compress_name, $bmqynext_opt_html_compress_val );
	update_option( $bmqynext_opt_mouse_effects_name, $bmqynext_opt_mouse_effects_val );
	update_option( $bmqynext_opt_rss_name, $bmqynext_opt_rss_val );
	update_option( $bmqynext_opt_rss_type_name, $bmqynext_opt_rss_type_val );

	bmqynext_show_udpate_success();
}
?>
<form action="" method="post" name="form1" novalidate="novalidate">
    <table class="form-table options-general-php ">
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_eevee_name; ?>"><?php esc_html_e('Eevee display', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Eevee display', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_show_eevee_name; ?>"><input name="<?php echo $bmqynext_opt_show_eevee_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_show_eevee_name; ?>" value="1" <?php checked( $bmqynext_opt_show_eevee_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?> <?php esc_html_e('(To learn about Eevee, please visit: https://codepen.io/davidkpiano/pen/NAZarB)', 'bmqynext') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_eevee_name; ?>"><?php esc_html_e('Html Compress', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Eevee display', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_html_compress_name; ?>"><input name="<?php echo $bmqynext_opt_html_compress_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_html_compress_name; ?>" value="1" <?php checked( $bmqynext_opt_html_compress_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_show_eevee_name; ?>"><?php esc_html_e('Mouse Click Effects', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('Eevee display', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_mouse_effects_name; ?>"><input name="<?php echo $bmqynext_opt_mouse_effects_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_mouse_effects_name; ?>" value="1" <?php checked( $bmqynext_opt_mouse_effects_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="<?php echo $bmqynext_opt_rss_name; ?>"><?php esc_html_e('RSS', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php esc_html_e('RSS', 'bmqynext') ?></span></legend>
                    <label for="<?php echo $bmqynext_opt_rss_name; ?>"><input name="<?php echo $bmqynext_opt_rss_name; ?>" type="checkbox" id="<?php echo $bmqynext_opt_rss_name; ?>" value="1" <?php checked( $bmqynext_opt_rss_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr id="bmqynextRSSWrap" style="-display: none;">
            <th scope="row"><label for="<?php echo $bmqynext_opt_rss_type_name; ?>">RSS <?php esc_html_e('File type', 'bmqynext') ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span>RSS <?php esc_html_e('File type', 'bmqynext') ?></span></legend>
                    <label><input type="radio" name="<?php echo $bmqynext_opt_rss_type_name; ?>" value="rdf_url" <?php checked($bmqynext_opt_rss_type_val, 'rdf_url') ?>> <span class="date-time-text format-i18n">RDF/RSS 1.0</span></label><br>
                    <label><input type="radio" name="<?php echo $bmqynext_opt_rss_type_name; ?>" value="rss_url" <?php checked($bmqynext_opt_rss_type_val, 'rss_url') ?>> <span class="date-time-text format-i18n">RSS 0.92</span></label><br>
                    <label><input type="radio" name="<?php echo $bmqynext_opt_rss_type_name; ?>" value="rss2_url" <?php checked($bmqynext_opt_rss_type_val, 'rss2_url') ?>> <span class="date-time-text format-i18n">RSS 2.0</span></label><br>
                    <label><input type="radio" name="<?php echo $bmqynext_opt_rss_type_name; ?>" value="atom_url" <?php checked($bmqynext_opt_rss_type_val, 'atom_url') ?>> <span class="date-time-text format-i18n">Atom</span></label><br>
                </fieldset>
            </td>
        </tr>
    </table>
	<?php submit_button( __('Save Changes'), 'primary', $bmqynext_options_other ); ?>
</form>