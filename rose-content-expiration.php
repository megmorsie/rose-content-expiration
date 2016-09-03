<?php
/**
 * Plugin Name: Content Expiration Shortcode
 * Plugin URI: http://megabyterose.com/
 * Description: This shortcode allows you to schedule temporary content within your posts, pages, and custom post types. Set start/end dates for promotional content or time-sensitive alerts. Functions are pluggable.
 * Version: 1.0
 * Author: Megan Morsie
 * Author URI: http://megabyterose.com/
 * License: GPL2
 */

if ( !(function_exists(rose_content_expiration_shortcode)) ) {
	function rose_content_expiration_shortcode( $atts, $content ) {
		$a = shortcode_atts( array(
	        'start' => '1 January 1970 00:00:00', // 0000000000, lowest Unix time
	        'end' => '19 January 2038 03:14:07', // 2147483647, highest Unix time
	    ), $atts );

	    $start_time = strtotime( $a['start'] );
	    $end_time = strtotime( $a['end'] );

	    // Set Timezone
	    $timezone = get_option('timezone_string');
	    date_default_timezone_set($timezone); 
	    $today = time();

	    // Support Use of Shortcodes Within [temp]
	    $content = do_shortcode($content);

	    if ( ($today < $start_time) || ($today > $end_time) ) return;
	    return $content;
	}
	add_shortcode( 'temp', 'rose_content_expiration_shortcode' );
}
