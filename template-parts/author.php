<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */
?>

<div class="site-author motion-element" itemprop="author" itemscope>
    <?php bmqynext_the_custom_logo() ?>
    <p class="site-author-name" itemprop="name"><?php bloginfo('name') ?></p>
    <p class="site-description motion-element" itemprop="description"><?php bloginfo('description') ?></p>
</div>