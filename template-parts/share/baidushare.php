<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(get_option('bmqynext_options_share_baidu')==="button"): ?>
  <div class="bdsharebuttonbox">
    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
    <a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a>
    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
    <a href="#" class="bds_more" data-cmd="more"></a>
    <a class="bds_count" data-cmd="count"></a>
  </div>
  <script>
    window._bd_share_config = {
      "common": {
        "bdText": "",
        "bdMini": "2",
        "bdMiniList": false,
        "bdPic": ""
      },
      "share": {
        "bdSize": "16",
        "bdStyle": "0"
      },
      "image": {
        "viewList": ["tsina", "douban", "sqq", "qzone", "weixin", "twi", "fbook"],
        "viewText": "分享到：",
        "viewSize": "16"
      }
    }
  </script>
<?php elseif(get_option('bmqynext_options_share_baidu')==="slide"): ?>
  <script>
    window._bd_share_config = {
      "common": {
        "bdText": "",
        "bdMini": "1",
        "bdMiniList": false,
        "bdPic": ""
      },
      "image": {
        "viewList": ["tsina", "douban", "sqq", "qzone", "weixin", "twi", "fbook"],
        "viewText": "分享到：",
        "viewSize": "16"
      },
      "slide": {
        "bdImg": "5",
        "bdPos": "left",
        "bdTop": "100"
      }
    }
  </script>
<?php endif; ?>
<script>
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='//bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
