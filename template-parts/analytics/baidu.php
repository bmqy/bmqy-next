<?php if(!empty(get_option('bmqynext_options_baidu_analytics'))): ?>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?<?php echo get_option('bmqynext_options_baidu_analytics') ?>";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<?php endif; ?>
