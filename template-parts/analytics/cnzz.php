<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(!empty(get_option('bmqynext_options_cnzz_analytics'))):?>
	<script src="https://s11.cnzz.com/z_stat.php?id=<?php echo get_option('bmqynext_options_cnzz_analytics')?>&web_id=<?php echo get_option('bmqynext_options_cnzz_analytics')?>" language="JavaScript"></script>
<?php endif; ?>
