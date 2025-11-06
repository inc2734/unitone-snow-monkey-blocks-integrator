<?php
/**
 * @package unitone-snow-monkey-blocks-integrator
 * @author Takashi Kitajima
 * @license GPL-2.0+
 */

/**
 * Enqueue assets.
 */
function unitone_snow_monkey_blocks_integrator_enqueue_assets() {
	wp_enqueue_style(
		'unitone-snow-monkey-blocks-integrator',
		UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_URL . '/dist/css/app.css',
		array( 'unitone', 'snow-monkey-blocks' ),
		filemtime( UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/dist/css/app.css' )
	);
}
add_action( 'enqueue_block_assets', 'unitone_snow_monkey_blocks_integrator_enqueue_assets' );
