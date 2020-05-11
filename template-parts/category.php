<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */
?>
<article class="post post-type-normal" itemscope itemtype="http://schema.org/Article">
    <?php the_title( sprintf( '<header class="post-header"><h2 class="post-title"><a class="post-title-link" href="%s" itemprop="url" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2><div class="post-meta"><time class="post-time" itemprop="dateCreated" datetime="'. the_modified_date("",'', '',false) .'" content="'. the_modified_date("y-m-d",'', '',false) .'">'. the_modified_date("m-d",'', '',false) .'</time></div></header>' ); ?>
</article><!-- .entry-header -->
