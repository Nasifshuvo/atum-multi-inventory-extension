<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nasifshuvo.com
 * @since             1.0.0
 * @package           Ns_Atum_Extension
 *
 * @wordpress-plugin
 * Plugin Name:       NS Atum Extension
 * Plugin URI:        https://github.com/Nasifshuvo/atum-multi-inventory-extension
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nasif Shuvo
 * Author URI:        https://nasifshuvo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ns-atum-extension
 * Domain Path:       /languages
 */

// Test to see if Atum Multi Inventory is active (including network activated).
$plugin_dir = trailingslashit( WP_PLUGIN_DIR );
$plugin_path = $plugin_dir . 'atum-muti-inventory/atum-muti-inventory.php';
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (
    in_array( 
		$plugin_path, 
		apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
	  ) 
) {
    // Custom code here. WooCommerce is active, however it has not 
    // necessarily initialized (when that is important, consider
    // using the `woocommerce_init` action).
}else{
	// echo '<h3>'.__('Please install & activate Atum Multi Inventory Plugin before activating NS Atum Extension.', 'ap').'</h3>';
	
	echo '<div id="message" class="error">
	<p>Please install & activate Atum Multi Inventory Plugin before activating NS Atum Extension.</p>
	</div>';
    //Adding @ before will prevent XDebug output
	// @trigger_error(__('Please install & activate Atum Multi Inventory Plugin.', 'ap'), E_USER_ERROR);
	deactivate_plugins( $plugin_dir .'/ns-atum-extension/ns-atum-extension.php' );
	
}

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NS_ATUM_EXTENSION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ns-atum-extension-activator.php
 */
function activate_ns_atum_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ns-atum-extension-activator.php';
	Ns_Atum_Extension_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ns-atum-extension-deactivator.php
 */
function deactivate_ns_atum_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ns-atum-extension-deactivator.php';
	Ns_Atum_Extension_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ns_atum_extension' );
register_deactivation_hook( __FILE__, 'deactivate_ns_atum_extension' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ns-atum-extension.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ns_atum_extension() {

	$plugin = new Ns_Atum_Extension();
	$plugin->run();

}
run_ns_atum_extension();
