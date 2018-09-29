<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
        'nav_icon'=>[
            'type'=> 'switch',
            'label'=> 'Nav Icon',
            'tips'=> '',
            'defaultValue'=> 1
        ],
        'nav_search'=>[
	        'type'=> 'switch',
	        'label'=> 'Nav Search',
	        'placeholder'=> '',
	        'tips'=> '(Add search items to the navigation menu)',
	        'defaultValue'=> 1
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