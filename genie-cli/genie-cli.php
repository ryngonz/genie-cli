<?php
/**
 * @package   Genie_CLI
 * @author    Ryan Gonzales <ryngonz@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.mojobitz.com
 * @copyright 2014 Ryan Gonzales
 *
 * @wordpress-plugin
 * Plugin Name:       Genie CLI
 * Plugin URI:        http://www.mojobitz.com
 * Description:       A command line plugin that lets user use a command line text box to search, create new posts/pages, delete, or do proceedure calls inside the wordpress installation. It can also optimize and clean the wp_posts table from drafts or trashed posts and backup the database. To start the plugin, you must be using an administrator account and press " ` " or " ~ ".
 * Version:           1.0.0 alpha
 * Author:            Ryan Gonzales
 * Author URI:        http://www.mojobitz.com
 * Text Domain:       genie-cli-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-genie-cli.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-genie-cli.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Genie_CLI with the name of the class defined in
 *   `class-genie-cli.php`
 */
register_activation_hook( __FILE__, array( 'Genie_CLI', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Genie_CLI', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Genie_CLI with the name of the class defined in
 *   `class-genie-cli.php`
 */
add_action( 'plugins_loaded', array( 'Genie_CLI', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-genie-cli-admin.php` with the name of the plugin's admin file
 * - replace Genie_CLI_Admin with the name of the class defined in
 *   `class-genie-cli-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-genie-cli-admin.php' );
	add_action( 'plugins_loaded', array( 'Genie_CLI_Admin', 'get_instance' ) );

}
