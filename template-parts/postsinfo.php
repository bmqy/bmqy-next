<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.0
 */
?>

<nav class="site-state motion-element">
    <div class="site-state-item site-state-posts">
        <a href="/archive/">
            <span class="site-state-item-count"><?php echo bmqynext_get_posts_count() ?></span>
            <span class="site-state-item-name"><?php echo _ex('Aside', 'Post format') ?></span>
        </a>
    </div>
    <div class="site-state-item site-state-categories">
        <a href="/category/">
            <span class="site-state-item-count"><?php echo bmqynext_get_categorys_count() ?></span>
            <span class="site-state-item-name"><?php echo _ex('Categories', 'Theme starter content') ?></span>
        </a>
    </div>
    <div class="site-state-item site-state-tags">
        <a href="/tag/">
            <span class="site-state-item-count"><?php echo bmqynext_get_targs_count() ?></span>
            <span class="site-state-item-name"><?php echo _ex('Tag', 'taxonomy singular name') ?></span>
        </a>
    </div>
</nav>