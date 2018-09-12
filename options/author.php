<?php
/**
 * Created by IntelliJ IDEA.
 * User: ibicn
 * Date: 2018-08-15
 * Time: 13:20
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
	],
	'copyright_template'=>[
		'type'=> 'textarea',
		'label'=> 'Copyright Content',
        'size'=> 'large',
		'tips'=> 'Note: {{ title }} represents the current article title, {{ link }} represents the current article link'
	]
];

if ( isset( $_POST[ $formName ] ) ) {
	$siteFiled = [
		'keyword',
		'description'
	];

	foreach ($baseItem as $item=> $val){
		$field = !in_array($item, $siteFiled) ? $formName .'_'. $item : $item;
		if(!empty($_POST[$field])){
			if($baseItem[$item]['type']==='switch'){
				$value = !empty($_POST[$field]) ? $_POST[$field] : 0;
			}
			else{
				if($baseItem[$item]['type']==='textarea'){
					$value = esc_html($_POST[$field]);
				}else{
					$value = $_POST[$field];
				}
			}

			update_option($field, $value);
		}
	}

	bmqynext_show_udpate_success();
}

bmqynext_generate_form($formName, $baseItem);
?>