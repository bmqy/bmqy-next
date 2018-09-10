<?php
/**
 * Created by IntelliJ IDEA.
 * User: ibicn
 * Date: 2018-08-15
 * Time: 13:20
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
		'tips'=> '请填写淘宝店铺二维码图片地址，推荐尺寸：140*140'
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
		'tips'=> '可填加html标签，最终以显示 3 行为宜'
	]
];

if ( isset( $_POST[ $formName ] ) ) {
	$siteFiled = [
		'keyword',
		'description'
	];

	foreach ($baseItem as $item=> $val){
		$field = !in_array($item, $siteFiled) ? $formName .'_'. $item : $item;
		if($baseItem[$item]['type']==='switch'){
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