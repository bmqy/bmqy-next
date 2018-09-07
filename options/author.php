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
		'label'=> 'Copyright display',
		'defaultValue'=> 1,
	],
	'copyright_apply_category'=>[
		'type'=> 'checkbox',
		'label'=> 'Copyright Apply Category',
		'defaultValue'=> 1,
		'values'=> bmqynext_getCategorysArray(),
	],
	'copyright_template'=>[
		'type'=> 'textarea',
		'label'=> 'Copyright Content',
        'size'=> 'large'
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
			$value = $_POST[$field];
		}

		update_option($field, $value);

	}

	bmqynext_show_udpate_success();
}

bmqynext_generate_form($formName, $baseItem);
?>