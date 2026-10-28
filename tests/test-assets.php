<?php
/**
 * Asset registration tests.
 *
 * @package unitone-snow-monkey-blocks-integrator
 */

// Exercise the integration stylesheet independently of the optional products.
require_once dirname( __DIR__ ) . '/inc/assets.php';

class AssetsTest extends WP_UnitTestCase {

	/**
	 * The shared block-assets hook serves both the editor and the front end.
	 */
	public function test_shared_block_assets_hook() {
		$this->assertSame( 10, has_action( 'enqueue_block_assets', 'unitone_snow_monkey_blocks_integrator_enqueue_assets' ) );
	}

	/**
	 * Keep the URL, dependency order and cache version intact after a build.
	 */
	public function test_stylesheet_registration() {
		$handle = 'unitone-snow-monkey-blocks-integrator';
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
		unitone_snow_monkey_blocks_integrator_enqueue_assets();

		$this->assertTrue( wp_style_is( $handle, 'enqueued' ) );
		$style = wp_styles()->registered[ $handle ];
		$this->assertSame( UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_URL . '/dist/css/app.css', $style->src );
		$this->assertSame( array( 'unitone', 'snow-monkey-blocks' ), $style->deps );
		$this->assertSame( filemtime( UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/dist/css/app.css' ), $style->ver );
	}
}
