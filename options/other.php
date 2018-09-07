<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */


$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
	'show_eevee'=>[
		'type'=> 'switch',
		'label'=> 'Eevee display',
		'tips'=> '(To learn about Eevee, please visit: https://codepen.io/davidkpiano/pen/NAZarB)',
		'defaultValue'=> 1
	],
	'html_compress'=>[
		'type'=> 'switch',
		'label'=> 'Html Compress',
		'defaultValue'=> 1
	],
	'mouse_effects'=>[
		'type'=> 'switch',
		'label'=> 'Mouse Click Effects',
		'defaultValue'=> 1
	],
	'rss'=>[
		'type'=> 'select',
		'label'=> 'RSS',
        'values'=> [
	        '0'=> __('Nothing', wp_get_theme()->get('TextDomain')),
            'rdf_url'=> 'rdf_url',
            'rss_url'=> 'rss_url',
            'rss2_url'=> 'rss2_url',
            'atom_url'=> 'atom_url',
        ],
		'defaultValue'=> 0
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