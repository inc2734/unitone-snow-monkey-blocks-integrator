<?php
/**
 * @package unitone-snow-monkey-blocks-integrator
 * @author Takashi Kitajima
 * @license GPL-2.0+
 */

function unitone_snow_monkey_blocks_integrator_enqueue_assets() {
	wp_enqueue_style(
		'unitone-snow-monkey-blocks-integrator',
		UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_URL . '/dist/css/app.css',
		array()
	);
}
add_action( 'enqueue_block_assets', 'unitone_snow_monkey_blocks_integrator_enqueue_assets' );
