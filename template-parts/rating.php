<?php
/**
* The template part for displaying content
*
* @package WordPress
* @subpackage bmqy-next
* @since bmqy next
*/
?>

<?php if($rating && (is_home() && is_post())): ?>
<script type="text/javascript">
  wpac_init = window.wpac_init || [];
  wpac_init.push({widget: 'Rating', id: <?php echo get_option('bmqynext_options_rating_appid')?>,
    el: 'wpac-rating',
    color: '<?php echo get_option('bmqynext_options_rating_color')!==''?get_option('bmqynext_options_rating_color'):"fc6423" ?>'
  });
  (function() {
	  if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = '//embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
  })();
  </script>
<?php endif; ?>
