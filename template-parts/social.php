<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */
?>
<?php if ( has_nav_menu( 'social' ) ) : ?>
    <?php
    bmqynext_wp_social_menu();
    ?>
<?php endif; ?>