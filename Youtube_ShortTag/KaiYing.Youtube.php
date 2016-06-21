<?php
/*
Plugin Name: [Youtube] ShortTag
Plugin URI: wp.kaiying.tw
Description: 於文章中嵌入Youtube影片，可用URL or Youtube ID方式嵌入文章，可設定寬高，預設560x315。
Sameple 1 : [Youtube]eS-y2R9cmnQ[/Youtube]
Sameple 2 : [Youtube width="672" height="378"]https://www.youtube.com/watch?v=f95yosNEIoc[/Youtube]
Version: 1.0.0
Author: Kathy Lai
Author URI: wp.kaiying.tw
*/

add_shortcode( 'Youtube', 'shortcodeYoutube' );

/**
 *   Youtube Tags
 *  [Youtube width="560" height ="315"] URL / YoutubeID [/Youtube]
 */
function shortcodeYoutube($atts, $content = "")
{
	$a = shortcode_atts( array(
        'width' => '560',    //560
        'height' => '315',   //315
    ), $atts );
	
	if(filter_var($content, FILTER_VALIDATE_URL))
	{
		$url = "https://www.youtube.com/embed/".substr($content,-11);
	}else{
	    $url = "https://www.youtube.com/embed/".$content;
	}
	
    $syntax =  '<iframe width="'.$a['width'].'" height="'.$a['height'].'" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
	
    return $syntax; 
}

?>
