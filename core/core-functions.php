<?php

/**
* Options wrapper
*/

function v($arr,$key, $default='')
  {
    if(!isset($arr[$key])) return $default;
    return $arr[$key];
  }

/**
* Localization 
*/
	    
	load_theme_textdomain( 'core', TEMPLATEPATH . '/core/languages' );

	    $locale = get_locale();
	    $locale_file = TEMPLATEPATH . "/core/languages/$locale.php";
	    if ( is_readable( $locale_file ) )
		    require_once( $locale_file );
		    
?>