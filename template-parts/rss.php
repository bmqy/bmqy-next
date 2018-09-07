<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.0
 */
?>

<?php if(get_option('bmqynext_options_rss')!==0): ?>
<div class="feed-link motion-element">
    <a href="<?php bloginfo(!empty(get_option('bmqynext_options_rss'))?get_option('bmqynext_options_rss'):'rss2_url'); ?>" target="_blank" rel="alternate">
        <i class="fa fa-rss"></i>
        RSS
    </a>
</div>
<?php endif; ?>