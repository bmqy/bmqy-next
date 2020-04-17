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
	'use_motion'=>[
		'type'=> 'switch',
		'label'=> 'Use Motion',
		'defaultValue'=> 1
	],
	'bg_effects'=>[
		'type'=> 'select',
		'label'=> 'Bg Effects',
		'values'=> [
			''=> __('Unenabled', 'bmqynext'),
			'canvas_nest'=> 'Canvas Nest',
			'three_waves'=> 'Three Waves',
			'canvas_lines'=> 'Canvas Lines',
			'canvas_sphere'=> 'Canvas Sphere',
			'canvas_ribbon'=> 'Canvas Ribbon',
		],
		'tips'=> '"Canvas Ribbon" needs "Pisces" theme support.',
		'defaultValue'=> 1
	],
	'fancybox'=>[
		'type'=> 'switch',
		'label'=> 'Fancybox',
		'defaultValue'=> 1
	],
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
	],
	'login_security'=>[
		'type'=> 'switch',
		'label'=> 'Login Security',
		'defaultValue'=> 1
	],
	'login_security_flag'=>[
		'type'=> 'input',
		'label'=> 'Login security flag',
		'tips'=> 'The only sign for backstage landing entry',
		'placeholder'=> 'flag',
	],
	'login_security_redirect'=>[
		'type'=> 'input',
		'label'=> 'Login security redirect',
		'tips'=> 'Jump link after background login verification failed',
		'placeholder'=> 'redirect url',
	],
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