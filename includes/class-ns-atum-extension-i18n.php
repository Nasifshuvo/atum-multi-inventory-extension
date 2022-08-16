<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nasifshuvo.com
 * @since      1.0.0
 *
 * @package    Ns_Atum_Extension
 * @subpackage Ns_Atum_Extension/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ns_Atum_Extension
 * @subpackage Ns_Atum_Extension/includes
 * @author     Nasif Shuvo <shuvo.nasif@gmail.com>
 */
class Ns_Atum_Extension_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ns-atum-extension',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
