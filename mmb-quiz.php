<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/riverswan/
 * @since             1.0.0
 * @package           Mmb_Quiz
 *
 * @wordpress-plugin
 * Plugin Name:       Mamabook Quiz
 * Plugin URI:        https://github.com/riverswan/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Paul Swan
 * Author URI:        https://github.com/riverswan/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mmb-quiz
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MMB_QUIZ_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mmb-quiz-activator.php
 */
function activate_mmb_quiz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mmb-quiz-activator.php';
	Mmb_Quiz_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mmb-quiz-deactivator.php
 */
function deactivate_mmb_quiz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mmb-quiz-deactivator.php';
	Mmb_Quiz_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mmb_quiz' );
register_deactivation_hook( __FILE__, 'deactivate_mmb_quiz' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mmb-quiz.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mmb_quiz() {

	$plugin = new Mmb_Quiz();
	$plugin->run();

}
run_mmb_quiz();
