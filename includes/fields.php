<?php
/**
 * Fields
 *
 * @package     NickDavis\Plugin
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\Plugin;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'after_setup_theme', __NAMESPACE__ . '\load_carbon_fields' );
/**
 * Loads the Carbon Fields package.
 *
 * NB. The composer files can be loaded earlier (e.g. plugins_loaded) but
 * Carbon Fields itself should be booted on after_setup_theme.
 *
 * @see https://carbonfields.net/docs/carbon-fields-quickstart
 *
 * @since 1.0.0
 */
function load_carbon_fields() {
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', __NAMESPACE__ . '\register_example_field' );
/**
 * Registers the client name Asset field with Carbon Fields.
 *
 * @see https://carbonfields.net/docs/containers-usage
 * @see https://carbonfields.net/docs/fields-usage
 *
 * @since 1.0.0
 */
function register_example_field() {
	Container::make( 'post_meta', 'Example Metabox' )
	         ->where( 'post_type', '=', 'post' )
	         ->set_context( 'carbon_fields_after_title' )
	         ->add_fields( array(
		         Field::make( 'text', 'nd_example', 'Example Field' )
	         ) );
}
