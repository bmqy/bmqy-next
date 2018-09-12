<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
        'show_logo'=>[
            'type'=> 'switch',
            'label'=> 'Home Logo display',
            'tips'=> '(please upload your logo icon in "appearance &gt; Custom &gt; site identity")',
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
        'since'=>[
	        'type'=> 'input',
	        'label'=> 'Site since',
	        'placeholder'=> '2014',
	        'tips'=> 'This time will be displayed at the bottom of the site, for example: ©2014 - 2018.',
        ],
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