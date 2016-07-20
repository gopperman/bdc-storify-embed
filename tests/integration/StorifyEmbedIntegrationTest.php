<?php
namespace Plugin_Storify_Embed;

class BDC_Storify_Embed_Integration_Test extends \WP_UnitTestCase {
	/**
	 * Test that the shortcode exists using WordPress's `shortcode_exists`
	 */
	function test_shortcode_added() {
		$this->assertTrue( shortcode_exists( 'storify' ) );
	}
}
