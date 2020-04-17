<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(get_option('bmqynext_options_disqus_enabled')==='1' && !empty(get_option('bmqynext_options_disqus_shortname'))): ?>
	<?php if(!is_home()): ?>
        <?php if(get_option('bmqynext_options_disqus_count')==='1'): ?>
        <script id="dsq-count-scr" src="https://<?php echo get_option('bmqynext_options_disqus_shortname') ?>.disqus.com/count.js" async></script>
        <?php endif; ?>

        <?php if(comments_open() || get_comments_number()): ?>
        <script type="text/javascript">
            var disqus_config = function () {
                this.page.url = '<?php echo get_post_permalink() ?>';
                this.page.identifier = '<?php echo get_page_by_path() ?>';
                this.page.title = '<?php echo the_title() ?>';
            };
            var d = document, s = d.createElement('script');
            s.src = 'https://<?php echo get_option('bmqynext_options_disqus_shortname') ?>.disqus.com/embed.js';
            s.setAttribute('data-timestamp', '' + +new Date());
            (d.head || d.body).appendChild(s);
        </script>
        <?php endif ?>
	<?php endif; ?>
<?php endif; ?>