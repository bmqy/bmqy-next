<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.0
 */
?>

<?php if(get_option('bmqynext_opt_rss')==='1'): ?>
<div class="feed-link motion-element">
    <a href="<?php bloginfo(!empty(get_option('bmqynext_opt_rss_type'))?get_option('bmqynext_opt_rss_type'):'rss2_url'); ?>" target="_blank" rel="alternate">
        <i class="fa fa-rss"></i>
        RSS
    </a>
</div>
<?php endif; ?>