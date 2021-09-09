<?php
/**
 * File contains functions for Logout settings.
 *
 * @package inactive-logout
 */

// Not Permission to agree more or less then given.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Main Class Defined
 *
 * @since   1.0.0
 * @author  Deepen
 */
final class Inactive_Logout_Main {

	/**
	 * Class instance.
	 *
	 * @access protected
	 *
	 * @var $instance
	 */
	protected static $instance;

	/**
	 * Return class instance.
	 *
	 * @return static Instance of class.
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Inactive_Logout_Main constructor.
	 */
	protected function __construct() {
		add_action( 'init', array( $this, 'ina_load_text_domain' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ), 9999 );

		//Load Finally
		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ), 9999 );

		add_filter( 'plugin_action_links', array( $this, 'action_link' ), 10, 2 );

		$this->ina_plugins_loaded();
	}

	/**
	 * Plugin activation callback.
	 *
	 * @see register_deactivation_hook()
	 */
	public static function ina_activate() {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			global $wpdb;
			$old_blog = $wpdb->blogid;

			// Get all blog ids.
			$blogids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" ); // WPCS: db call ok, cache ok.
			foreach ( $blogids as $blog_id ) {
				switch_to_blog( $blog_id );
				self::instance()->_ina_activate_multisite();
			}
			switch_to_blog( $old_blog );

			return;
		} else {
			self::instance()->_ina_activate_multisite();
		}

		// Load Necessary Components after activation.
		self::instance()->ina_plugins_loaded();
	}

	/**
	 * Saving options for multisite.
	 */
	protected function _ina_activate_multisite() {
		$time = 15 * 60; // 15 Minutes
		update_option( '__ina_logout_time', $time );
		update_option( '__ina_popup_overlay_color', '#000000' );
		update_option( '__ina_logout_message', '<p>You are being timed-out out due to inactivity. Please choose to stay signed in or to logoff.</p><p>Otherwise, you will be logged off automatically.</p>' );
		update_option( '__ina_warn_message', '<h3>Wakeup !</h3><p>You have been inactive for {wakup_timout}. Press continue to continue browsing.</p>' );
	}

	/**
	 * Managing things when plugin is deactivated.
	 */
	public static function ina_deactivate() {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {
			global $wpdb;
			$old_blog = $wpdb->blogid;

			// Get all blog ids.
			$blogids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" ); // WPCS: db call ok, cache ok.

			foreach ( $blogids as $blog_id ) {
				switch_to_blog( $blog_id );
				delete_option( '__ina_logout_time' );
				delete_option( '__ina_logout_message' );
				delete_option( '__ina_warn_message' );
				delete_option( '__ina_enable_redirect' );
				delete_option( '__ina_redirect_page_link' );

				delete_site_option( '__ina_overrideby_multisite_setting' );
				delete_site_option( '__ina_logout_time' );
				delete_site_option( '__ina_logout_message' );
				delete_site_option( '__ina_warn_message' );
				delete_site_option( '__ina_enable_redirect' );
				delete_site_option( '__ina_redirect_page_link' );
			}
			switch_to_blog( $old_blog );

			return;
		} else {
			delete_option( '__ina_logout_time' );
			delete_option( '__ina_logout_message' );
			delete_option( '__ina_warn_message' );
			delete_option( '__ina_enable_redirect' );
			delete_option( '__ina_redirect_page_link' );
		}
	}

	/**
	 * Manging things when plugin is loaded.
	 */
	protected function ina_plugins_loaded() {
		if ( is_user_logged_in() ) {
			$this->ina_load_dependencies();
		}

		//Load this because it does not need logged in check.
		require_once INACTIVE_LOGOUT_DIR_PATH . 'src/class-inactive-logout-functions.php';
	}

	/**
	 * Require Dependencies files.
	 */
	protected function ina_load_dependencies() {
		// Loading Admin Views.
		if ( is_admin() ) {
			// Loading Helpers.
			if ( empty( get_option( 'ina_tour_dismissed' ) ) && "yes" != get_option( 'ina_tour_dismissed' ) ) {
				require_once INACTIVE_LOGOUT_DIR_PATH . 'src/class-inactive-logout-pointers.php';
			}

			require_once INACTIVE_LOGOUT_DIR_PATH . 'src/class-inactive-logout-admin-views.php';
		}

		$concurrent = ina_helpers()->get_overrided_option( '__ina_concurrent_login' );

		// Checking if advanced settings are enabled
		// @added from 1.6.0.
		$ina_multiuser_timeout_enabled = ina_helpers()->get_overrided_option( '__ina_enable_timeout_multiusers' );
		if ( ! empty( $ina_multiuser_timeout_enabled ) ) {
			$disable_concurrent_login = ina_helpers()->ina_check_user_role_concurrent_login();
			if ( $disable_concurrent_login ) {
				require_once INACTIVE_LOGOUT_DIR_PATH . 'src/class-inactive-concurrent-login-functions.php';
			}
		} else {
			if ( isset( $concurrent ) && 1 === intval( $concurrent ) ) {
				require_once INACTIVE_LOGOUT_DIR_PATH . 'src/class-inactive-concurrent-login-functions.php';
			}
		}
	}

	/**
	 * Loading Backend Scripts.
	 */
	public function load_scripts() {
		global $current_user;

		if ( is_user_logged_in() ) {
			// Check if multisite.
			$ina_logout_time          = ina_helpers()->get_overrided_option( '__ina_logout_time' ) ? ina_helpers()->get_overrided_option( '__ina_logout_time' ) : null;
			$idle_disable_countdown   = ina_helpers()->get_overrided_option( '__ina_disable_countdown' ) ? ina_helpers()->get_overrided_option( '__ina_disable_countdown' ) : null;
			$ina_warn_message_enabled = ina_helpers()->get_overrided_option( '__ina_warn_message_enabled' ) ? ina_helpers()->get_overrided_option( '__ina_warn_message_enabled' ) : null;
			$ina_countdown_timer      = ina_helpers()->get_overrided_option( '__ina_countdown_timeout' ) ? ina_helpers()->get_overrided_option( '__ina_countdown_timeout' ) : null;

			$ina_multiuser_timeout_enabled = ina_helpers()->get_overrided_option( '__ina_enable_timeout_multiusers' );
			if ( $ina_multiuser_timeout_enabled ) {
				$ina_multiuser_settings = ina_helpers()->get_overrided_option( '__ina_multiusers_settings' );
				foreach ( $ina_multiuser_settings as $ina_multiuser_setting ) {
					if ( in_array( $ina_multiuser_setting['role'], $current_user->roles, true ) ) {
						$ina_logout_time = $ina_multiuser_setting['timeout'] * 60; // Seconds.
					}
				}
			}

			$min                      = ( SCRIPT_DEBUG == true ) ? '' : '.min';
			$disable_timeoutjs        = ina_helpers()->ina_check_user_role();
			$ina_enable_debugger      = ina_helpers()->get_overrided_option( '__ina_enable_debugger' );
			$ina_disable_login_screen = ina_helpers()->get_overrided_option( '__ina_disable_login_screen' );
			if ( ! $disable_timeoutjs ) {
				wp_enqueue_script( 'ina-logout-js', INACTIVE_LOGOUT_ASSETS_URL . 'js/scripts' . $min . '.js', array( 'jquery' ), time(), true ); //Calling time here because if this script is cached may cause issues.

				wp_localize_script( 'ina-logout-js', 'ina_ajax', array(
					'ajaxurl'      => admin_url( 'admin-ajax.php' ),
					'ina_security' => wp_create_nonce( '_checklastSession' ),
					'i10n'         => [
						'ok'         => __( 'Ok', 'inactive-logout' ), //Reverted back to default because dynamic variables cant be translated
						'close'      => __( 'Close without Reloading', 'inactive-logout' ), //Reverted back to default because dynamic variables cant be translated
						'login_wait' => __( 'Logging in. Please wait', 'inactive-logout' ),
						'hour'       => __( 'hour', 'inactive-logout' ),
						'hours'      => __( 'hours', 'inactive-logout' ),
						'minute'     => __( 'minute', 'inactive-logout' ),
						'minutes'    => __( 'minutes', 'inactive-logout' ),
						'second'     => __( 'second', 'inactive-logout' ),
						'seconds'    => __( 'seconds', 'inactive-logout' ),
					],
					'settings'     => [
						'timeout'              => ( isset( $ina_logout_time ) ) ? $ina_logout_time : 15 * 60,
						'disable_countdown'    => ( isset( $idle_disable_countdown ) && 1 === intval( $idle_disable_countdown ) ) ? $idle_disable_countdown : false,
						'warn_message_enabled' => ( isset( $ina_warn_message_enabled ) && 1 === intval( $ina_warn_message_enabled ) ) ? $ina_warn_message_enabled : false,
						'countdown_timeout'    => ( isset( $ina_countdown_timer ) ) ? $ina_countdown_timer : 10,
						'enable_debugger'      => ! empty( $ina_enable_debugger ) ? 1 : 0,
						'disable_login'        => ! empty( $ina_disable_login_screen ) ? 1 : 0
					],
					'is_admin'     => is_admin() ? true : false,
				) );
			}

			//Debugging Script
			wp_register_script( 'ina-logout-inactive-logoutonly-js', INACTIVE_LOGOUT_ASSETS_URL . 'js/scripts-helper' . $min . '.js', array(
				'jquery',
				'wp-color-picker'
			), INACTIVE_LOGOUT_VERSION, true );
			wp_register_script( 'ina-logout-inactive-select-js', INACTIVE_LOGOUT_VENDOR_URL . 'select2/js/select2' . $min . '.js', array( 'jquery' ), INACTIVE_LOGOUT_VERSION, true );
			wp_register_style( 'ina-logout-inactive-select', INACTIVE_LOGOUT_VENDOR_URL . 'select2/css/select2' . $min . '.css', false, INACTIVE_LOGOUT_VERSION );
			wp_localize_script( 'ina-logout-inactive-logoutonly-js', 'ina_other_ajax', array(
				'ajaxurl'      => admin_url( 'admin-ajax.php' ),
				'ina_security' => wp_create_nonce( '_ina_nonce_security' ),
			) );

			wp_enqueue_style( 'ina-logout', INACTIVE_LOGOUT_ASSETS_URL . 'css/style' . $min . '.css', false, INACTIVE_LOGOUT_VERSION );
		}
	}

	/**
	 * Load the text domain.
	 */
	function ina_load_text_domain() {
		$domain = 'inactive-logout';
		apply_filters( 'plugin_locale', get_locale(), $domain );
		load_plugin_textdomain( $domain, false, trailingslashit( basename( dirname( __DIR__ ) ) ) . 'lang/' );
	}

	/**
	 * Show configure link in main plugins page.
	 *
	 * @param $actions
	 * @param $plugin_file
	 *
	 * @return array
	 */
	function action_link( $actions, $plugin_file ) {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = INA_PLUGIN_ABS_NAME;
		}

		if ( $plugin == $plugin_file ) {
			$settings = array( 'settings' => '<a href="options-general.php?page=inactive-logout">' . __( 'Configure', 'inactive-logout' ) . '</a>' );

			$actions = array_merge( $settings, $actions );
		}

		return $actions;
	}
}
