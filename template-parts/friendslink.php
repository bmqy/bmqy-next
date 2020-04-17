<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>
<?php
bmqynext_list_friendlinks([
	'orderby' => 'rating',
	'order' => 'DESC',
	'limit' => -1,
	'category' => '',
	'exclude_category' => '',
	'category_name' => '',
	'hide_invisible' => 1,
	'show_updated' => 0,
	'echo' => 1,
	'categorize' => 1,
	'title_li' => __('Bookmarks'),
	'title_before' => '<div class="links-of-blogroll-title"><i class="fa fa-fw fa-globe"></i>',
	'title_after' => '</div>',
	'category_orderby' => 'name',
	'category_order' => 'ASC',
	'class' => 'links-of-blogroll motion-element links-of-blogroll-inline',
	'category_before' => '<div id="%id" class="%class">',
	'category_after' => '</div>'
]);
?>