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
        'rating_appid'=>[
            'type'=> 'input',
            'label'=> 'Rating',
            'placeholder'=> 'appid',
        ],
        'rating_color'=>[
            'type'=> 'input',
            'label'=> 'Rating Color',
            'placeholder'=> 'fc6423',
        ],
        'changyan_enabled'=>[
            'type'=> 'switch',
            'label'=> 'Chang yan',
            'tips'=> 'Enabled',
            'defaultValue'=> 1
        ],
        'changyan_appid'=>[
            'type'=> 'input',
            'label'=> 'Chang yan appid',
            'placeholder'=> 'appid',
        ],
        'changyan_appkey'=>[
            'type'=> 'input',
            'label'=> 'Chang yan appkey',
            'placeholder'=> 'appkey',
        ],
        'disqus_enabled'=>[
            'type'=> 'switch',
            'label'=> 'Disqus',
            'tips'=> 'Enabled',
            'defaultValue'=> 1
        ],
        'disqus_shortname'=>[
            'type'=> 'input',
            'label'=> 'Disqus Shortname',
            'placeholder'=> 'Shortname',
        ],
        'disqus_count'=>[
            'type'=> 'switch',
            'label'=> 'Disqus Count',
            'tips'=> '(是否显示评论数量)',
            'defaultValue'=> 1,
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