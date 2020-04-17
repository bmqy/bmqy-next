<?php
/**
 * Template for displaying search forms in bmqy-next
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>
<div class="popup search-popup local-search-popup" style="display:none;">
    <div class="local-search-header clearfix">
        <span class="search-icon"><i class="fa fa-search"></i> </span>
        <span class="popup-btn-close"><i class="fa fa-times-circle"></i></span>
        <div class="local-search-input-wrapper">
            <input autocomplete="off" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bmqynext' ); ?>" spellcheck="false" type="text" id="local-search-input" autocapitalize="none" autocorrect="off" name="s">

            <!--<input type="search" id="search-form-1" class="search-field" placeholder="搜索…" value="">-->
        </div>
    </div>
    <div id="local-search-result"></div>
</div>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: none;">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'bmqynext' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bmqynext' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="btn"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'bmqynext' ); ?></span></button>
</form>
