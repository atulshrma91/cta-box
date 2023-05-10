<?php

if( !defined("ABSPATH") ) {
    exit;
}

/**
 * CtaBoxCore Class
 */

if (!class_exists("CtaBoxCore")) {

    class CtaBoxCore {
        
        // Constructor
        public function __construct() {
            // Enqueue script
            add_action( "wp_enqueue_scripts", [$this, "cta_box_scripts"], 10, 1 );
            // Register shortcode
            add_shortcode("cta_box", [$this, "cta_box_shortcode"], 10, 1);
        }

        // Enqueue script callback
        public function cta_box_scripts() {
            wp_enqueue_script("cta-box",  plugin_dir_url(__FILE__) . "scripts/cta-box.js", array("jquery"), true, "1.0.0" );
            wp_localize_script( "cta-box", "cart_ajax", array( "ctaAjaxurl" => admin_url( "admin-ajax.php" ) ) );
        }

        // Shortcode callback function
        public function cta_box_shortcode($atts){
            // Parse shortcode attributes
            $attr = shortcode_atts(array(
                "title" => "Start Using Divi",
                "message" => "Discover the power and flexibility of Divi, the ultimate WordPress theme and visual page builder. Create stunning websites with ease and elevate your web design game. Click the button below to get started with Divi today!",
                "button_label" => "Try it for free",
                "button_url" => "https://elegantthemes.com"
            ), $atts);

            // Build HTML output
            ob_start();
            ?>
                <div class="cta-box">
                    <h3><?php echo esc_html($attr["title"]); ?></h3>
                    <p><?php echo esc_html($attr["message"]); ?></p>
                    <p><a class="button cta-box-btn" href="<?php echo esc_html($attr["button_url"]); ?>"><?php echo esc_html($attr["button_label"]); ?></a></p>
                    <p class="cta-box-clicks">0 Clicks</p>
                </div>
            <?php
            $output_string = ob_get_contents();
            ob_end_clean();
            return $output_string;
        }

    }

}