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
        'share_baidu'=>[
            'type'=> 'select',
            'label'=> 'Baidu Share',
            'values'=> [
            	''=> __('Unenabled', wp_get_theme()->get('TextDomain')),
	            'button'=> __('Button', wp_get_theme()->get('TextDomain')),
	            'slide'=> __('Slide', wp_get_theme()->get('TextDomain')),
            ]
        ],
        'share_addthis'=>[
            'type'=> 'input',
            'label'=> 'Addthis Share',
            'placeholder'=> '',
            'defaultValue'=> '',
	        'tips'=> __('Please fill in pubid, for example: ra-5ba08b500bc8cdfd', wp_get_theme()->get('TextDomain'))
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