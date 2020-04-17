<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */

$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
	'show_shop'=>[
		'type'=> 'switch',
		'label'=> 'Shop Display',
		'defaultValue'=> 1,
	],
	'shop_title'=>[
		'type'=> 'input',
		'label'=> 'Shop Title',
		'values'=> bmqynext_getCategorysArray(),
	],
	'shop_icon'=>[
		'type'=> 'input',
		'label'=> 'Shop Icon',
		'tips'=> 'Shop icon, recommended size: 140*140'
	],
	'shop_apply_category'=>[
		'type'=> 'checkbox',
		'label'=> 'Shop Apply Category',
		'values'=> bmqynext_getCategorysArray(),
	],
	'shop_template'=>[
		'type'=> 'textarea',
		'label'=> 'Shop Content',
        'size'=> 'large',
		'tips'=> 'Support html tags, preferably display 3 lines'
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