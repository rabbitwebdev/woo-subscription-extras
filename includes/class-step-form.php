<?php

class WSE_Step_Form {

    public function __construct() {
        add_action( 'woocommerce_before_add_to_cart_button', [$this, 'display_step_form'] );
        add_action( 'woocommerce_add_cart_item_data', [$this, 'save_extras_to_cart'], 10, 3 );
        add_filter( 'woocommerce_get_item_data', [$this, 'display_extras_in_cart'], 10, 2 );
    }

    public function display_step_form() {
        if ( ! is_product() || ! function_exists('wcs_is_product_subscription') ) return;

        global $product;
        if ( ! wcs_is_product_subscription( $product ) ) return;

        wp_enqueue_script('wse-script', plugins_url('../assets/script.js', __FILE__), ['jquery'], null, true);
        wp_enqueue_style('wse-style', plugins_url('../assets/style.css', __FILE__));

        echo '<div id="wse-step-form">';
        echo '<div class="wse-step" data-step="1">
                <h4>Step 1: Choose an Add-On</h4>
                <label><input type="checkbox" name="extra_cheese" value="yes"> Extra Cheese - £2</label><br>
                <label><input type="checkbox" name="priority_support" value="yes"> Priority Support - £5</label><br>
                <button class="next-step">Next</button>
              </div>';
        echo '<div class="wse-step" data-step="2" style="display:none;">
                <h4>Step 2: Review & Confirm</h4>
                <p>Your options will be added to your subscription.</p>
                <button class="prev-step">Back</button>
              </div>';
        echo '</div>';
    }

    public function save_extras_to_cart( $cart_item_data, $product_id, $variation_id ) {
        if ( isset($_POST['extra_cheese']) ) {
            $cart_item_data['extra_cheese'] = true;
        }
        if ( isset($_POST['priority_support']) ) {
            $cart_item_data['priority_support'] = true;
        }
        return $cart_item_data;
    }

    public function display_extras_in_cart( $item_data, $cart_item ) {
        if ( isset($cart_item['extra_cheese']) ) {
            $item_data[] = ['name' => 'Extra Cheese', 'value' => 'Yes'];
        }
        if ( isset($cart_item['priority_support']) ) {
            $item_data[] = ['name' => 'Priority Support', 'value' => 'Yes'];
        }
        return $item_data;
    }
}
