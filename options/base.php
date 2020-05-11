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
        'enable_highlight'=>[
            'type'=> 'switch',
            'label'=> 'Enable Highlight',
            'defaultValue'=> 1
        ],
        'enable_highlight_number'=>[
            'type'=> 'switch',
            'label'=> 'Enable Highlight Number',
            'defaultValue'=> 1
        ],
		'highlight_theme'=>[
			'type'=> 'select',
			'label'=> __('Highlight Theme'),
			'values'=> [
                'a11y-dark' => 'a11y-dark',
                'a11y-light' => 'a11y-light',
                'agate' => 'agate',
                'an-old-hope' => 'an-old-hope',
                'androidstudio' => 'androidstudio',
                'arduino-light' => 'arduino-light',
                'arta' => 'arta',
                'ascetic' => 'ascetic',
                'atelier-cave-dark' => 'atelier-cave-dark',
                'atelier-cave-light' => 'atelier-cave-light',
                'atelier-dune-dark' => 'atelier-dune-dark',
                'atelier-dune-light' => 'atelier-dune-light',
                'atelier-estuary-dark' => 'atelier-estuary-dark',
                'atelier-estuary-light' => 'atelier-estuary-light',
                'atelier-forest-dark' => 'atelier-forest-dark',
                'atelier-forest-light' => 'atelier-forest-light',
                'atelier-heath-dark' => 'atelier-heath-dark',
                'atelier-heath-light' => 'atelier-heath-light',
                'atelier-lakeside-dark' => 'atelier-lakeside-dark',
                'atelier-lakeside-light' => 'atelier-lakeside-light',
                'atelier-plateau-dark' => 'atelier-plateau-dark',
                'atelier-plateau-light' => 'atelier-plateau-light',
                'atelier-savanna-dark' => 'atelier-savanna-dark',
                'atelier-savanna-light' => 'atelier-savanna-light',
                'atelier-seaside-dark' => 'atelier-seaside-dark',
                'atelier-seaside-light' => 'atelier-seaside-light',
                'atelier-sulphurpool-dark' => 'atelier-sulphurpool-dark',
                'atelier-sulphurpool-light' => 'atelier-sulphurpool-light',
                'atom-one-dark-reasonable' => 'atom-one-dark-reasonable',
                'atom-one-dark' => 'atom-one-dark',
                'atom-one-light' => 'atom-one-light',
                'brown-paper' => 'brown-paper',
                'codepen-embed' => 'codepen-embed',
                'color-brewer' => 'color-brewer',
                'darcula' => 'darcula',
                'dark' => 'dark',
                'default' => 'default',
                'docco' => 'docco',
                'dracula' => 'dracula',
                'far' => 'far',
                'foundation' => 'foundation',
                'github-gist' => 'github-gist',
                'github' => 'github',
                'gml' => 'gml',
                'googlecode' => 'googlecode',
                'gradient-dark' => 'gradient-dark',
                'grayscale' => 'grayscale',
                'gruvbox-dark' => 'gruvbox-dark',
                'gruvbox-light' => 'gruvbox-light',
                'hopscotch' => 'hopscotch',
                'hybrid' => 'hybrid',
                'idea' => 'idea',
                'ir-black' => 'ir-black',
                'isbl-editor-dark' => 'isbl-editor-dark',
                'isbl-editor-light' => 'isbl-editor-light',
                'kimbie.dark' => 'kimbie.dark',
                'kimbie.light' => 'kimbie.light',
                'lightfair' => 'lightfair',
                'magula' => 'magula',
                'mono-blue' => 'mono-blue',
                'monokai-sublime' => 'monokai-sublime',
                'monokai' => 'monokai',
                'night-owl' => 'night-owl',
                'nord' => 'nord',
                'obsidian' => 'obsidian',
                'ocean' => 'ocean',
                'paraiso-dark' => 'paraiso-dark',
                'paraiso-light' => 'paraiso-light',
                'pojoaque' => 'pojoaque',
                'purebasic' => 'purebasic',
                'qtcreator_dark' => 'qtcreator_dark',
                'qtcreator_light' => 'qtcreator_light',
                'railscasts' => 'railscasts',
                'rainbow' => 'rainbow',
                'routeros' => 'routeros',
                'school-book' => 'school-book',
                'shades-of-purple' => 'shades-of-purple',
                'solarized-dark' => 'solarized-dark',
                'solarized-light' => 'solarized-light',
                'srcery' => 'srcery',
                'sunburst' => 'sunburst',
                'tomorrow-night-blue' => 'tomorrow-night-blue',
                'tomorrow-night-bright' => 'tomorrow-night-bright',
                'tomorrow-night-eighties' => 'tomorrow-night-eighties',
                'tomorrow-night' => 'tomorrow-night',
                'tomorrow' => 'tomorrow',
                'vs' => 'vs',
                'vs2015' => 'vs2015',
                'xcode' => 'xcode',
                'xt256' => 'xt256',
                'zenburn' => 'zenburn',
            ],
			'defaultValue'=> 'tomorrow'
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