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


//Tạo Slider
function create_slider_post_type()
{
  register_post_type(
    'slider',
    array(
      'labels' => array(
        'name' => __('Slider'),
        'singular_name' => __('Slider')
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail'),
      'menu_icon' => 'dashicons-format-gallery',
    )
  );
}
add_action('init', 'create_slider_post_type');

//Tạo thuộc tính màu sắc
add_action('woocommerce_single_product_summary', 'custom_product_color', 25);
function custom_product_color()
{
  global $product;

  // Lấy danh sách các giá trị của thuộc tính "Color"
  $colors = get_terms(array(
    'taxonomy' => 'pa_color',
    'hide_empty' => false,
  ));

  // Hiển thị danh sách các giá trị của thuộc tính "Color"
  if (!empty($colors)) {
    echo '<span class="posted_in">Color: ';
    foreach ($colors as $color) {
      echo '<a href="' . get_term_link($color) . '">' . $color->name . '</a>, ';
    }
    echo '</span>';
  }
}


// Đẩy SKU lên trên giá
add_action('woocommerce_single_product_summary', 'move_sku_above_price', 6);
function move_sku_above_price()
{
  global $product;
  // echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); // Hiển thị danh mục sản phẩm
  // echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); // Hiển thị tag sản phẩm
  echo '<span class="sku_wrapper">Mã số: <span class="sku">' . $product->get_sku() . '</span></span>'; // Hiển thị SKU sản phẩm
}
