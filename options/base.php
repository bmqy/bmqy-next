<?php
/**
 * Created by IntelliJ IDEA.
 * User: bmqy
 * Date: 2018-08-15
 * Time: 13:20
 */

$formName = wp_get_theme()->get('TextDomain'). '_options';
$baseItem = [
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
	        'type'=> 'checkbox',
	        'label'=> 'Home Logo display',
	        'tips'=> '(please upload your logo icon in "appearance &gt; Custom &gt; site identity")',
            'defaultValue'=> 1
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