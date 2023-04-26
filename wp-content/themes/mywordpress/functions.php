<?php
//Apply Woocommerce cho dự án
function my_custom_wc_theme_support()
{
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'my_custom_wc_theme_support');
//Khởi tạo menu
function register_my_menu()
{
  register_nav_menu('header-menu', __('Menu chính'));
  register_nav_menu('footer-menu', __('Menu footer'));
}
add_action('init', 'register_my_menu');

//Sử dụng bộ công cụ gõ cũ
// add_filter('use_block_editor_for_post', '__return_false');

// Thay đổi ký hiệu tiền tệ trong WooCommerce thành "CA$"
function add_custom_currency_symbol($currency_symbol, $currency)
{
  switch ($currency) {
    case 'CAD':
      $currency_symbol = 'CA$';
      break;
  }
  return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'add_custom_currency_symbol', 10, 2);

//custom thanh serch
function custom_search_filter($query)
{
  if ($query->is_search && !is_admin()) {
    $query->set('post_type', array('post', 'product'));
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');


//Tùy biến dialog
function myproject_ti_woocommerce_wishlist_template($template, $template_name, $template_path)
{
  if ($template_name == 'dialog_box/ti-addedtowishlist-dialogbox.php') {
    $template = get_stylesheet_directory() . '/ti-woocommerce-wishlist/templates/dialog_box/my-addedtowishlist-dialogbox.php';
  }
  return $template;
}

add_filter('woocommerce_locate_template', 'myproject_ti_woocommerce_wishlist_template', 10, 3);

add_filter('tinvwl_icon_name', 'myproject_ti_wishlist_icon_name');
function myproject_ti_wishlist_icon_name($icon_name)
{
  $icon_name = 'fa fa-heart'; // Thay đổi tên của icon thành "fa fa-heart"
  return $icon_name;
}
