<?php
/**
 * Created by IntelliJ IDEA.
 * User: ibicn
 * Date: 2018-08-15
 * Time: 13:20
 */
?>
<form action="" method="post" name="form1">
    <h2>版权信息设置</h2>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="topRecommendStatus">版权信息显示</label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span>版权信息显示</span></legend>
                    <label for="topRecommendStatus"><input name="status" type="checkbox" id="topRecommendStatus" value="1" <?php checked( '1', $opt_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle">版权信息内容</label></th>
            <td><input name="title" type="text" id="topRecommendTitle" value="<?php echo $opt_val; ?>" class="regular-text ltr"/></td>
        </tr>
    </table>
	<?php submit_button( __('Save Changes'), 'primary', 'submit_bmqy_subTheme_topRecommend' ); ?>
</form>