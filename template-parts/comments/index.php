<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(get_option('bmqynext_options_changyan_enabled')==='1'): ?>
	<?php get_template_part( "template-parts/comments/changyan", "bmqynext-changyan" );?>
<?php elseif(get_option('bmqynext_options_disqus_enabled')==='1'): ?>
	<?php get_template_part( "template-parts/comments/disqus", "bmqynext-disqus" );?>
<?php endif; ?>
