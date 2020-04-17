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
		'style'=>[
			'type'=> 'select',
			'label'=> __('Themes'),
			'values'=> [
				'muse'=> 'Muse',
				'mist'=> 'Mist',
				'pisces'=> 'Pisces',
				'gemini'=> 'Gemini',
			],
			'defaultValue'=> 'muse'
		],
		'custom_style'=>[
			'type'=> 'textarea',
			'label'=> 'Themes custom css',
			'size'=> 'large',
			'tips'=> 'Please enter your custom CSS.'
		],
		'custom_stylesheet'=>[
			'type'=> 'switch',
			'label'=> 'Themes custom stylesheet',
			'tips'=> '(When you need to use a style sheet file, edit the "custom. css" file in the theme CSS directory and enable it.)',
			'defaultValue'=> 1
		],
		'keyword'=>[
			'type'=> 'input',
			'label'=> 'Site keyword',
			'placeholder'=> '',
			'defaultValue'=> '',
		],
		'description'=>[
			'type'=> 'textarea',
			'label'=> 'Site description',
			'size'=> 'large',
			'placeholder'=> '',
			'defaultValue'=> '',
		],
        'show_logo'=>[
            'type'=> 'switch',
            'label'=> 'Home Logo display',
            'tips'=> '(please upload your logo icon in "appearance &gt; Custom &gt; site identity")',
            'defaultValue'=> 1
        ],
        'since'=>[
	        'type'=> 'input',
	        'label'=> 'Site since',
	        'placeholder'=> '2014',
	        'tips'=> 'This time will be displayed at the bottom of the site, for example: ©2014 - 2018.',
        ],
        'filing'=>[
	        'type'=> 'input',
	        'label'=> 'Website filing',
	        'placeholder'=> '',
	        'tips'=> 'website record code.',
        ],
        'powered'=>[
	        'type'=> 'switch',
	        'label'=> 'Powered',
	        'defaultValue'=> 1,
	        'tips'=> 'Footer \'powered-by\' and \'theme-info\' copyright.',
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