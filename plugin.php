<?php
/**
 * Plugin Name: Ten Adams Assets
 * Plugin URI: https://iamnickdavis.com
 * Description: Adds the Asset custom post type.
 * Version: 1.0.0
 * Author: Ten Adams
 * Author URI: http://tendadams.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace NickDavis\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Sets up the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'PLUGIN_VERSION', '1.0.0' );
	define( 'PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'PLUGIN_URL', $plugin_url );
	define( 'PLUGIN_FILE', __FILE__ );
}

/**
 * Initializes the plugin hooks.
 *
 * May not be needed for all plugins I guess, but as an example.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
}

/**
 * Runs functions on plugin activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_plugin() {
	flush_rewrite_rules();
}

/**
 * Runs functions on plugin deactivation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}

/**
 * Initializes vendor files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_vendor() {
	$autoloader = PLUGIN_DIR . 'vendor/autoload.php';

	if ( is_readable( $autoloader ) ) {
		require_once $autoloader;
	}
}

/**
 * Initializes config files.
 *
 * Commented out example shown.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_config() {
	//require_once PLUGIN_DIR . 'config/package-name.php';
}

/**
 * Initialise the include files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_includes() {
	include PLUGIN_DIR . 'includes/custom.php';
	include PLUGIN_DIR . 'includes/fields.php';
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\launch' );
/**
 * Launches the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_constants();
	init_hooks();
	init_vendor();
	//init_config();
	init_includes();
}
