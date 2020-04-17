<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since bmqynext_ajax_search_post
 */
?>
    <footer id="footer" class="footer">
        <div class="footer-inner">
            <div class="copyright">© <?php echo !empty(get_option('bmqynext_options_since')) ? get_option('bmqynext_options_since') : '2014' ?> - <span itemprop="copyrightYear"><?php echo date("Y") ?></span> <span class="with-love"><i class="fa fa-heart"></i> </span><span class="author" itemprop="copyrightHolder"><?php bloginfo("name") ?></span>
            </div>

            <?php if(get_option("bmqynext_options_powered")==="1"):?>
            <div class="powered-by">
                <?php printf( __( 'Powered by %s', 'bmqynext' ), '<a target="_blank" href="'. esc_url( __( 'https://wordpress.org/', 'bmqynext' ) ) .'">WordPress</a>' ); ?>
            </div>

            <div class="theme-info">
                <?php _e("Themes") ?> -
                <a class="theme-link" target="_blank" href="https://github.com/bmqy/bmqy-next">
                    <?php echo (get_option('bmqynext_options_style')!=='')?get_option('bmqynext_options_style'):''?>
                </a>
            </div>
            <?php endif; ?>

            <?php if(false):?>
            <div style="display: none;">
                熊掌号：https://author.baidu.com/home/1545776927809018?from=bmqy
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <div class="back-to-top"><i class="fa fa-arrow-up"></i></div>
</div>
<?php wp_footer(); ?>

<?php
if(get_option('bmqynext_options_show_eevee')==='1') {
	get_template_part( "template-parts/eevee/eevee", "bmqynext-eevee" );
}
?>

<script type="text/javascript">
    "[object Function]" !== Object.prototype.toString.call(window.Promise) && (window.Promise = null)
</script>

<?php get_template_part( "template-parts/comments/index", "bmqynext-comments" );?>

<?php get_template_part( "template-parts/localsearch", "bmqynext-localsearch" );?>

</body>
</html>