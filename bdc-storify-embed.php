<?php
/**
 * Plugin Name: BDC Storify Embed
 * Plugin URI: http://www.boston.com
 * Description: Allow authors to embed storify posts into pages / posts
 * Version: 0.1.0
 * Author: Greg Opperman
 * Author URI: http://www.boston.com
 *
 * @package bdc.storify-embed
 * @version 0.1.0
 * @author Greg Opperman <gregory.opperman@globe.com>
 */

define( 'BDC_STORIFY_EMBED_REGEX', '#^https?://(www.)?storify\.com/.*#' );

class BDC_Storify_Embed {
	/**
	 * Set up the default handlers for embedding
	*/
	function __construct() {

		// Example URL: https://storify.com/furmannews/experience-furman
		wp_embed_register_handler( 'storify', BDC_STORIFY_EMBED_REGEX, array( $this, 'storify_embed_handler' ) );

		add_shortcode( 'storify', array( $this, 'storify_shortcode_handler' ) );
	}

	function storify_embed_handler( $matches, $attr, $url ) {
		$strip = array( 'http:', 'https:' );

		// Trim out protocol and trailing slash from url
		$story_url = esc_url( rtrim( str_replace( $strip, '', $url ), '/' ) );
		$js_url = $story_url . '.js?border=false'; // Inline JS URL for story
		$embed_url = $story_url . '/embed?border=false'; // The src for our iframe

		$embed = '<div class="storify"><iframe src="' . $embed_url . '" width="100%" height="750" frameborder="no" allowtransparency="true"></iframe><script src="' . $js_url . '"></script><noscript>[<a href="' . $story_url . '" target="_blank">View this on Storify</a>]</noscript></div>';

		return $embed;
	}

	function storify_shortcode_handler( $atts ) {
		global $wp_embed;
		if ( empty( $atts['url'] ) ) {
			return;
		}
		if ( ! preg_match( BDC_STORIFY_EMBED_REGEX, $atts['url'] ) ) {
			return;
		}
		return $wp_embed->shortcode( $atts, $atts['url'] );
	}
}

new BDC_Storify_Embed;


