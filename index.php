<?php
/**
 * Meta Tags
 *
 * @package     Meta_Tags
 * @version     1.0.0
 * @link        https://github.com/antibrand/meta
 *
 * Plugin Name:  meta
 * Plugin URI:   https://github.com/antibrand/meta
 * Description:  Meta tags for your website management system.
 * Version:      1.0.0
 * Author:
 * Author URI:
 * Text Domain:  antibrand
 * Domain Path:  /languages
 * Tested up to:
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class
 *
 * Defines constants, gets the initialization class file
 * plus the activation and deactivation classes.
 *
 * @since  1.0.0
 * @access public
 */

// First check for other classes with the same name.
if ( ! class_exists( 'Meta_Tags' ) ) :
	final class Meta_Tags {

		/**
		 * Instance of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object Returns the instance.
		 */
		public static function instance() {

			// Varialbe for the instance to be used outside the class.
			static $instance = null;

			if ( is_null( $instance ) ) {

				// Set variable for new instance.
				$instance = new self;

				// Define plugin constants.
				$instance->constants();

				// Require the core plugin class files.
				$instance->dependencies();

			}

			// Return the instance.
			return $instance;

		}

		/**
		 * Constructor method
		 *
		 * @since  1.0.0
		 * @access private
		 * @return self
		 */
		private function __construct() {}

		/**
		 * Define plugin constants
		 *
		 * Change the prefix and the text domain to that
		 * which suits the needs of your website.
		 *
		 * Change the version as appropriate.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function constants() {

			/**
			 * Plugin version
			 *
			 * Keeping the version at 1.0.0 as this is a starter plugin but
			 * you may want to start counting as you develop for your use case.
			 *
			 * @since  1.0.0
			 * @return string Returns the latest plugin version.
			 */
			if ( ! defined( 'ABMT_VERSION' ) ) {
				define( 'ABMT_VERSION', '1.0.0' );
			}

			/**
			 * Text domain
			 *
			 * @since  1.0.0
			 * @return string Returns the text domain of the plugin.
			 */
			if ( ! defined( 'ABMT_DOMAIN' ) ) {
				define( 'ABMT_DOMAIN', 'antibrand' );
			}

			/**
			 * Plugin directory  path
			 *
			 * @since  1.0.0
			 * @return string Returns the filesystem directory path (with trailing slash)
			 *                for the plugin __FILE__ passed in.
			 */
			if ( ! defined( 'ABMT_PATH' ) ) {
				define( 'ABMT_PATH', plugin_dir_path( __FILE__ ) );
			}

			/**
			 * Plugin directory  URL
			 *
			 * @since  1.0.0
			 * @return string Returns the URL directory path (with trailing slash)
			 *                for the plugin __FILE__ passed in.
			 */
			if ( ! defined( 'ABMT_URL' ) ) {
				define( 'ABMT_URL', plugin_dir_url( __FILE__ ) );
			}

			/**
			 * Universal slug
			 *
			 * This URL slug is used for various plugin admin & settings pages.
			 *
			 * The prefix will change in your search & replace in renaming the plugin.
			 * Change the second part of the define(), here as 'antibrand',
			 * to your preferred page slug.
			 *
			 * @since  1.0.0
			 * @return string Returns the URL slug of the admin pages.
			 */
			if ( ! defined( 'ABMT_ADMIN_SLUG' ) ) {
				define( 'ABMT_ADMIN_SLUG', 'antibrand' );
			}

		}

		/**
		 * Throw error on object clone.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {

			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', 'antibrand' ), '1.0.0' );

		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {

			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'This is not allowed.', 'antibrand' ), '1.0.0' );

		}

		/**
		 * Require the core plugin class files
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void Gets the file which contains the plugin initiation class.
		 */
		private function dependencies() {

			// The hub of all other dependency files.
			require_once ABMT_PATH . 'includes/class-init.php';

			// Include the activation class.
			require_once ABMT_PATH . 'includes/class-activate.php';

			// Include the deactivation class.
			require_once ABMT_PATH . 'includes/class-deactivate.php';

		}

	}
	// End core plugin class.

	/**
	 * Put an instance of the plugin class into a function
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance of the `Meta_Tags` class.
	 */
	function ab_meta() {

		return Meta_Tags::instance();

	}

	// Begin plugin functionality.
	ab_meta();

// End the check for the plugin class.
endif;

// Bail out now if the core class was not run.
if ( ! function_exists( 'ab_meta' ) ) {
	return;
}

/**
 * Register the activaction & deactivation hooks.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
register_activation_hook( __FILE__, '\abmt_activate_plugin' );
register_deactivation_hook( __FILE__, '\abmt_deactivate_plugin' );

/**
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abmt_activate_plugin() {

	// Run the activation class.
	abmt_activate();

}

/**
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abmt_deactivate_plugin() {

	// Run the deactivation class.
	abmt_deactivate();

}

/**
 * Check for Advanced Custom Fields.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF free or Pro plugin is active.
 */
function abmt_acf() {

	if ( class_exists( 'acf' ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Check for Advanced Custom Fields Pro.
 *
 * @since  1.0.0
 * @access public
 * @return bool Returns true if the ACF Pro plugin is active.
 */
function abmt_acf_pro() {

	if ( class_exists( 'acf_pro' ) ) {
		return true;
	} else {
		return false;
	}

}