<?php
/**
 * The template part for displaying main page
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(get_option('bmqynext_options_share_addthis')!==''): ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_inline_share_toolbox">
  <script type = "text/javascript" src = "//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo get_option('bmqynext_options_share_addthis')?>" async = "async" ></script>
</div>
<?php endif; ?>