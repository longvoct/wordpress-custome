<?php

/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

global $product;

if (!wc_review_ratings_enabled()) {
  return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = number_format($product->get_average_rating(), 1);
$rating_text = sprintf('%s', number_format($average, 1));
$rating_html = wc_get_rating_html($average, $rating_count, array('rated' => false));
?>

<?php if ($rating_count > 0) : ?>

  <div class="woocommerce-product-rating">
    <div class="star-rating-wrapper">
      <?php
      // Thêm đoạn mã để tạo ra số sao tương ứng với mức đánh giá
      $star_html = '';
      for ($i = 1; $i <= 5; $i++) {
        if ($i <= round($average, 0, PHP_ROUND_HALF_DOWN)) {
          $star_html .= '<svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0L15.3064 8.63729H24.3882L17.0409 13.9754L19.8473 22.6127L12.5 17.2746L5.15268 22.6127L7.95911 13.9754L0.611794 8.63729H9.69357L12.5 0Z" fill="#ECB75C"/></svg>';
        } else {
          $star_html .= '<svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0L15.3064 8.63729H24.3882L17.0409 13.9754L19.8473 22.6127L12.5 17.2746L5.15268 22.6127L7.95911 13.9754L0.611794 8.63729H9.69357L12.5 0Z" fill="#D8D8D8"/></svg>';
        }
      }
      echo $star_html;
      ?>
    </div>
    <div class="rating-number">
      <?php echo esc_html($rating_text); ?>
    </div>

    <div class="rating_line_vertical"></div>

    <?php if (comments_open()) : ?>
      <span class="woocommerce-review-link"><?php echo esc_html($review_count); ?> đánh giá</span>
    <?php endif; ?>

    <div class="rating_line_vertical"></div>

    <div class="product-sales">
      Đã bán: <?php echo esc_html($product->get_total_sales()); ?> sản phẩm
    </div>
  </div>

<?php endif; ?>