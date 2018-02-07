<?php
/**
 * Custom
 *
 * @package     NickDavis\Plugin
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\Plugin;

/**
 * Registers a custom post type via John Blackbourn's Extended CPTs package.
 *
 * @see https://github.com/johnbillion/extended-cpts
 *
 * @since 1.0.0
 */
add_action( 'init', function () {
	register_extended_post_type( 'custom-post-type', array(
		'menu_icon'     => 'dashicons-image-filter',
		'menu_position' => 49,
		'taxonomies'    => array( 'category', 'post_tag' )
	) );
} );
