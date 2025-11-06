<?php
/**
 * @package unitone-snow-monkey-blocks-integrator
 * @author Takashi Kitajima
 * @license GPL-2.0+
 */

/**
 * Load textdomain.
 */
function unitone_snow_monkey_blocks_integrator_load_textdomain() {
	load_plugin_textdomain( 'unitone-snow-monkey-blocks-integrator', false, basename( UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH ) . '/languages' );
}
add_action( 'init', 'unitone_snow_monkey_blocks_integrator_load_textdomain', 1 );
