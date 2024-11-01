<?php
/*
Plugin Name: SourTweet
Plugin URI: http://wordpress.sourcloud.com/sourtweet
Description: Add a footer to each post
Version: 1.0
Author: Erik Woitschig
Author URI: http://profiles.wordpress.org/sourcloud
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

function sourtweetscript() {
	wp_enqueue_script( 'sourcloud-twitter', plugins_url( 'js/sourcloud_twitter.js', __FILE__ ), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'sourtweetscript' );


if( !function_exists("sourtweet")){
	function sourtweet($content){

		if( !is_page( )){

		$permalink = get_permalink();
			$title = get_the_title();				
			$msg = '<a href="https://twitter.com/share" class="twitter-share-button" data-url="'.$permalink.'" data-text="'.$title.'">Tweet</a>';
	
		return $content . stripslashes( $msg );
		} else{
		return $content;
		}
	}

	add_filter('the_content', 'sourtweet');
}

?>