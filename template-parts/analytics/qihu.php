<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(!empty(get_option('bmqynext_options_qihu_sitemap_auto'))): ?>
    <script>
        //sitemap auto
        (function(){
            var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?<?php  echo get_option('bmqynext_options_qihu_sitemap_auto') ?>":"https://jspassport.ssl.qhimg.com/11.0.1.js?<?php  echo get_option('bmqynext_options_qihu_sitemap_auto') ?>";
            document.write('<script src="' + src + '" id="sozz"><\/script>');
        })();
    </script>
<?php endif; ?>
