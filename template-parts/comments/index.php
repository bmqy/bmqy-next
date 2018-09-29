<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-09-29
 * Time: 16:31
 */
?>
<?php if(get_option('bmqynext_options_changyan_enabled')==='1'): ?>
	<?php get_template_part( "template-parts/comments/changyan", "bmqynext-changyan" );?>
<?php elseif(get_option('bmqynext_options_disqus_enabled')==='1'): ?>
	<?php get_template_part( "template-parts/comments/disqus", "bmqynext-disqus" );?>
<?php endif; ?>
