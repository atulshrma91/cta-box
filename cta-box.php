<?php

/*
 * Plugin Name: CTA box
 * Plugin URI: 
 * Description: CTA box Shortcode plugin
 * License: CTA
 * Text Domain: cta-box
 * Version: 1.0.0
 * Author: Atul
 * Author URI: https://github.com/atulshrma91
 */


if( !defined("ABSPATH") ) {
    exit;
}

/**
 * CtaBox Class
 */

if (!class_exists("CtaBox")) {

    class CtaBox {

        // Constructor
        public function __construct() {
            require_once( plugin_dir_path(__FILE__) . "/includes/cta-box-core.php");
            register_activation_hook(__FILE__, [$this, "activation"]);
            register_deactivation_hook(__FILE__, [$this, "deactivation"]);
            if (class_exists("CtaBoxCore")) {
                $this->ctaBoxCore = new CtaBoxCore();
            }
        }

        public function activation() {}

        public function deactivation() {
          flush_rewrite_rules();
        }

    }

}

new CtaBox();
