<?php
/**
 * Plugin Name: Pardot Fields for Ninja Forms
 * Plugin URI: https://github.com/BlackbirdDigital/pardot-ninja-forms
 * Description: Pardot special Form Handler fields for Ninja Forms Webhooks
 * Version: 1.0.0
 * Author: Blackbird Digital
 * Author URI: https://blackbird.digital
 * License: MIT
 * Text Domain: nfpardot
 *
 * @package nfpardot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists('NF_Fields_Hidden') ) {

	function nfpardot_register_fields( $fields ) {
		$fields['pardot-cookie'] = new NF_PardotCookieField();
		$fields['pardot-spam']   = new NF_PardotSpamField();

		return $fields;
	}
	add_filter( 'ninja_forms_register_fields', 'nfpardot_register_fields' );

	function nfpardot_template_path( $paths ) {
		$paths[] = plugin_dir_path( __FILE__ ) . 'templates/';
		return $paths;
	}
	add_filter( 'ninja_forms_field_template_file_paths', 'nfpardot_template_path' );

	class NF_PardotCookieField extends NF_Fields_Hidden {
		protected $_name = 'pardot-cookie';
		protected $_nicename = 'Pardot Cookie';
		protected $_icon = 'paper-plane';
		protected $_templates = 'pardot-cookie';

		public function __construct() {
			parent::__construct();

			$this->_nicename = esc_html__( 'Pardot Cookie', 'nfpardot' );
		}
	}

	class NF_PardotSpamField extends NF_Fields_Hidden {

		protected $_name = 'pardot-spam';
		protected $_nicename = 'Pardot Spam';
		protected $_icon = 'ban';
		protected $_templates = 'pardot-spam';

		public function __construct() {
			parent::__construct();

			$this->_nicename = esc_html__( 'Pardot Spam', 'nfpardot' );
		}
	}

	function nfpardot_enqueue() {
		wp_enqueue_script( 'nfpardot', plugin_dir_url( __FILE__ ) . 'client.js', array('jquery', 'nf-front-end'), '1.0.0', true );
	}
	add_action( 'ninja_forms_enqueue_scripts', 'nfpardot_enqueue' );
}
