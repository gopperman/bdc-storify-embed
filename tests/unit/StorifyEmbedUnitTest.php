<?php
namespace Plugin_Storify_Embed;

class BDC_Storify_Embed_Unit_Test extends \WP_UnitTestCase {
	/**
	 * Store an instance of our plugin's object for testing direct calls to its
	 * methods
	 */
	private $bdc_storify_embed = null;

	/**
	 * Create an instance of our plugin's object
	 */
	public function setUp() {
		// before
		parent::setUp();

		$this->bdc_storify_embed = new \BDC_Storify_Embed;
	}

	/**
	 * Test that the related links shortcode works.
	 */
	function test_storify_embed_shortcode_works() {
		$content = '[storify url="https://storify.com/furmannews/experience-furman"]';
		$output = do_shortcode( $content );
		$this->assertEquals( '<div class="storify"><iframe src="//storify.com/furmannews/experience-furman/embed?border=false" width="100%" height="750" frameborder="no" allowtransparency="true"></iframe><script src="//storify.com/furmannews/experience-furman.js?border=false"></script><noscript>[<a href="//storify.com/furmannews/experience-furman" target="_blank">View this on Storify</a>]</noscript></div>', $output );

		// Bad URL should return nothing
		$content = '[storify url="https://boston.com"]';
		$output = do_shortcode( $content );
		$this->assertEquals( '', $output );
	}
}
