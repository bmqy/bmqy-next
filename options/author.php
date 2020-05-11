<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next
 */


$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
	'show_copyright'=>[
		'type'=> 'switch',
		'label'=> 'Copyright Display',
		'defaultValue'=> 1,
	],
	'copyright_apply_category'=>[
		'type'=> 'checkbox',
		'label'=> 'Copyright Apply Category',
		'values'=> bmqynext_getCategorysArray(),
	]
];

if ( isset( $_POST[ $formName ] ) ) {
	$siteFiled = [
		'keyword',
		'description'
	];

	foreach ($baseItem as $item=> $val){
		$field = !in_array($item, $siteFiled) ? $formName .'_'. $item : $item;
		if($baseItem[$item]['type']==='checkbox'){
			$value = !empty($_POST[$field]) ? $_POST[$field] : 0;
		}
		else{
			if($baseItem[$item]['type']==='textarea'){
				$value = !empty(esc_html($_POST[$field])) ? esc_html($_POST[$field]) : "";
			}else{
				$value = !empty($_POST[$field]) ? $_POST[$field] : "";
			}
		}

		update_option($field, $value);
	}

	bmqynext_show_udpate_success();
}

bmqynext_generate_form($formName, $baseItem);
?>