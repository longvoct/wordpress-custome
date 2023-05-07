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
// add_action('woocommerce_single_product_summary', 'custom_product_color', 25);
// function custom_product_color()
// {
//   global $product;

//   // Lấy danh sách các giá trị của thuộc tính "Color"
//   $colors = get_terms(array(
//     'taxonomy' => 'pa_color',
//     'hide_empty' => false,
//   ));

//   // Hiển thị danh sách các giá trị của thuộc tính "Color"
//   if (!empty($colors)) {
//     echo '<span class="posted_in">Color: ';
//     foreach ($colors as $color) {
//       echo '<a href="' . get_term_link($color) . '">' . $color->name . '</a>, ';
//     }
//     echo '</span>';
//   }
// }

// Đẩy SKU lên trên giá
add_action('woocommerce_single_product_summary', 'move_sku_above_price', 6);
function move_sku_above_price()
{
  global $product;
  echo '<div class="product-info">';
  echo '<span class="sku_wrapper">Mã số: <span class="sku">' . $product->get_sku() . '</span></span>'; // Hiển thị SKU sản phẩm
  echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); // Hiển thị danh mục sản phẩm
  // echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); // Hiển thị tag sản phẩm
  echo '</div>';
}

// Tab: Thay đổi nội dung tab mô tả sản phẩm
add_filter('woocommerce_product_description_tab_title', 'misha_rename_description_tab');

function misha_rename_description_tab($title)
{

  $title = 'Mô tả sản phẩm';
  return $title;
}
// Tab đánh giá sản phẩm
add_filter('woocommerce_product_tabs', 'change_reviews_tab_title', 98);
function change_reviews_tab_title($tabs)
{
  global $product;
  $count = $product->get_review_count();
  $tabs['reviews']['title'] = __('Đánh giá sản phẩm (' . $count . ')', 'woocommerce');
  return $tabs;
}

// 

function my_get_review_rating($comment_id)
{
  // Lấy đánh giá sản phẩm từ ID của đánh giá
  $rating = get_comment_meta($comment_id, 'rating', true);

  // Nếu không có đánh giá, trả về 0
  if (!$rating) {
    return 0;
  }

  return $rating;
}

function my_woocommerce_review_before_comment_meta($comment)
{
  $html = '';

  // Lấy số sao của đánh giá
  $rating = my_get_review_rating($comment->comment_ID);

  // Kiểm tra xem số sao có lớn hơn 0 hay không
  if ($rating > 0) {
    // Nếu số sao lớn hơn 0, tạo icon SVG tương ứng với số sao
    $html .= '<div class="star-rating_user">';
    for ($i = 1; $i <= $rating; $i++) {
      $html .= '<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">';
      $html .= '<path d="M7.25732 0L8.94118 5.18237H14.3902L9.98186 8.38525L11.6657 13.5676L7.25732 10.3647L2.84893 13.5676L4.53279 8.38525L0.1244 5.18237H5.57347L7.25732 0Z" fill="#ECB75C"/>';
      $html .= '</svg>';
    }
    $html .= '</div>';
  } else {
    // Nếu số sao bằng 0, hiển thị thông báo không có đánh giá
    $html .= 'Chưa có đánh giá.';
  }

  echo $html;
}

add_action('woocommerce_review_before_comment_meta', 'my_woocommerce_review_before_comment_meta');
