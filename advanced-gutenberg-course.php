<?php
/**
 * Main plugin file
 *
 * @package     Adv_Gutenberg_Courses\Example_Blocks
 * @author      Zac Gordon (@zgordon)
 * @license     GPL2+
 *
 * @wordpress-plugin
 * Plugin Name: Adv_Gutenberg_Courses - Advanced Examples
 * Plugin URI:  https://javascriptforwp.com/
 * Description: A plugin containing advanced examples for developers.  From <a href="https://javascriptforwp.com/product/advanced-gutenberg-development/">Zac Gordon's Advanced Gutenberg Development Course</a>.
 * Version:     1.0.0
 * Author:      Zac Gordon
 * Author URI:  https://twitter.com/zgordon
 * Text Domain: jsforwpadvblocks
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Adv_Gutenberg_Courses\Example_Blocks;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Gets this plugin's absolute directory path.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_directory() {
	return __DIR__;
}

/**
 * Gets this plugin's URL.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_url() {
	static $plugin_url;

	if ( empty( $plugin_url ) ) {
		$plugin_url = plugins_url( null, __FILE__ );
	}

	return $plugin_url;
}


/**
 * Adding a block category creates a Panel
 */
function create_jsforwp_advblocks_panel( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'jsforwpadvblocks',
				'title' => __( 'JSforWP Adv Blocks Panel', 'jsforwpadvblocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'create_jsforwp_advblocks_panel', 10, 2 );


// Enqueue JS and CSS
require __DIR__ . '/lib/register-scripts.php';

// Register block server side
require __DIR__ . '/lib/register-blocks.php';

// Register block server side
require __DIR__ . '/lib/block-categories.php';
