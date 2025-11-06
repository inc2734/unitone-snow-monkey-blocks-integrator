<?php
/**
 * Plugin name: unitone Snow Monkey Blocks integrator
 * Version: 0.0.2
 * Tested up to: 6.8
 * Requires at least: 6.8
 * Requires PHP: 7.4
 * Requires unitone: 1.0.0
 * Description: This plugin makes unitone beautifully display Snow Monkey Blocks.
 * Author: Takashi Kitajima
 * Author URI: https://2inc.org
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: unitone-snow-monkey-blocks-integrator
 *
 * @package unitone-snow-monkey-blocks-integrator
 * @author inc2734
 * @license GPL-2.0+
 */

namespace UnitoneSnowMonkeyBlocksIntegrator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

$autoloader_path = UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/vendor/autoload.php';
if ( file_exists( $autoloader_path ) ) {
	require_once $autoloader_path;
} else {
	return;
}

class Bootstrap {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, '_bootstrap' ) );
	}

	/**
	 * Bootstrap.
	 */
	public function _bootstrap() {
		require UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/inc/updater.php';

		if ( ! class_exists( '\Snow_Monkey\Plugin\Blocks\Bootstrap' ) ) {
			add_action(
				'admin_notices',
				function () {
					?>
					<div class="notice notice-warning is-dismissible">
						<p>
							<?php esc_html_e( '[unitone Snow Monkey Blocks Integrator] Needs the Snow Monkey Blocks.', 'unitone-snow-monkey-blocks-integrator' ); ?>
						</p>
					</div>
					<?php
				}
			);
			return;
		}

		$theme = wp_get_theme( get_template() );
		if ( 'unitone' !== $theme->template ) {
			add_action(
				'admin_notices',
				function () {
					?>
					<div class="notice notice-warning is-dismissible">
						<p>
							<?php esc_html_e( '[unitone Snow Monkey Blocks Integrator] Needs the unitone.', 'unitone-snow-monkey-blocks-integrator' ); ?>
						</p>
					</div>
					<?php
				}
			);
			return;
		}

		require UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/inc/i18n.php';
		require UNITONE_SNOW_MONKEY_BLOCKS_INTEGRATOR_PATH . '/inc/assets.php';
	}
}

new Bootstrap();
