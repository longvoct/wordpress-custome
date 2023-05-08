<?php

/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;
// Lấy link thêm vào danh sách yêu thích
$wishlist_link = do_shortcode('[ti_wishlists_addtowishlist]');
?>
<div class="woocommerce-variation-add-to-cart variations_button">
  <?php do_action('woocommerce_before_add_to_cart_button'); ?>

  <?php
  do_action('woocommerce_before_add_to_cart_quantity');

  woocommerce_quantity_input(
    array(
      'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
      'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
      'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
    )
  );

  do_action('woocommerce_after_add_to_cart_quantity');
  ?>

  <div class="actionbtn-with_product">
    <button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.9 5.73333L5.08557 14.275C5.22282 15.2638 6.06825 16 7.06658 16L17.8334 16C18.8317 16 19.6772 15.2638 19.8144 14.275L20.7632 7.43955C20.8883 6.53778 20.1878 5.73333 19.2774 5.73333L3.9 5.73333ZM3.9 5.73333L3.60486 3.4136C3.50205 2.60558 2.81454 2 2 2V2" stroke="white" stroke-width="1.5" />
        <path d="M9 20.5C9 19.6716 8.32843 19 7.5 19C6.67157 19 6 19.6716 6 20.5C6 21.3284 6.67157 22 7.5 22C8.32843 22 9 21.3284 9 20.5Z" stroke="white" stroke-width="1.5" />
        <path d="M19 20.5C19 19.6716 18.3284 19 17.5 19C16.6716 19 16 19.6716 16 20.5C16 21.3284 16.6716 22 17.5 22C18.3284 22 19 21.3284 19 20.5Z" stroke="white" stroke-width="1.5" />
      </svg>
      <?php echo esc_html($product->single_add_to_cart_text()); ?></button>
    <!-- Thêm cái wishlist -->
    <div class="wishlist-button_box">
      <?php echo $wishlist_link; ?>
    </div>
  </div>

  <?php do_action('woocommerce_after_add_to_cart_button'); ?>

  <input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
  <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
  <input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>