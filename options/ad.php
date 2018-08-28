<?php
/**
 * Created by IntelliJ IDEA.
 * User: ibicn
 * Date: 2018-08-15
 * Time: 13:20
 */
?>
<form action="" method="post" name="form1">
    <h2>广告位设置</h2>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="topRecommendStatus">顶部广告推荐位</label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span>顶部广告推荐位</span></legend>
                    <label for="topRecommendStatus"><input name="status" type="checkbox" id="topRecommendStatus" value="1" <?php checked( '1', $opt_val ); ?> />&nbsp;<?php esc_html_e('Activate') ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendTitle">顶部广告推荐位标题</label></th>
            <td><input name="title" type="text" id="topRecommendTitle" value="<?php echo $opt_val; ?>"
                       class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendLink">顶部广告推荐位链接</label></th>
            <td><input name="link" type="text" id="topRecommendLink" value="<?php echo $opt_val; ?>"
                       class="regular-text ltr"/></td>
        </tr>
        <tr>
            <th scope="row"><label for="topRecommendImage">顶部广告推荐位图片</label></th>
            <td><input name="image" type="text" id="topRecommendImage"
                       aria-describedby="topRecommendImage_description" value="<?php echo $opt_val; ?>"
                       class="regular-text ltr"/>&nbsp;<a class="thickbox" title="插入图片" href="#">插入图片</a>
                <p class="description" id="topRecommendImage_description">请填写图片链接地址，推荐尺寸：1198*80</p></td>
        </tr>
    </table>
	<?php submit_button( __('Save Changes'), 'primary', 'submit_bmqy_subTheme_topRecommend' ); ?>
</form>