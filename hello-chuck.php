<?php
/**
 * @package Hello_Chuck
 * @author Matt Mullenweg
 * @version 1.5.1
 */
/*
Plugin Name: Hello Chuck
Plugin URI: http://wordpress.org/#
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up by Chuck Norris. When activated you will randomly see Chuck dispense advice in the upper right of your admin screen on every page.
Author: Matt Mullenweg with creative edits by Andrea R
Version: 1.5.1
Author URI: http://ma.tt/
*/

function hello_chuck_get_lyric() {
	/** These are words of wisdom from Chuck Norris */
	$lyrics = "Chuck Norris once posted to his blog. Just by thinking it.
Chuck Norris IS Akismet.
Chuck Norris never needs to upgrade or backup. You do though.
Chuck Norris once had a drink at WP tavern. That's why everyone is there.
Chuck Norris wrote the GPL.
Chuck Norris counted to infinity - twice.
Chuck Norris just created your image thumbnails.
Chuck Norris never uses plugins.
Chuck Norris controls your widgets.
Chuck Norris writes fully valid code the first time.
Chuck Norris can divide by zero.
Chuck Norris can paste from Word just fine.
Chuck Norris once wrote a function. It created the Internet.";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_chuck() {
	$chosen = hello_chuck_get_lyric();
	echo "<p id='chuck'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'hello_chuck');

// We need some CSS to position the paragraph
function chuck_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( 'rtl' == get_bloginfo( 'text_direction' ) ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#chuck {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'chuck_css');

?>
