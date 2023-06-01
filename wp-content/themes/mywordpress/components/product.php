<?php
$product_id = get_the_ID();
$product = wc_get_product($product_id);
if ($product->has_child()) {
  $variations = $product->get_available_variations();
}
?>

<div class="product-list__item">
  <div>
    <a href="<?php the_permalink(); ?>">
      <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'product-list__image')); ?>
    </a>
  </div>
  <h3 class="product-list__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p class="product-list__price"><?php echo $product->get_price_html(); ?></p>
  <span class="my-favorite">
    <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
  </span>

  <?php if (isset($variations)) : ?>
    <div class="product-list__variations">
      <?php
      $colors = array(); // Khởi tạo mảng để lưu các màu sắc duy nhất
      foreach ($variations as $variation) :
        // Kiểm tra nếu biến thể có thuộc tính màu sắc
        if (isset($variation['attributes']['attribute_pa_color'])) {
          $color = $variation['attributes']['attribute_pa_color'];
          // Nếu màu sắc chưa tồn tại trong mảng, thêm vào mảng
          if (!in_array($color, $colors)) {
            $colors[] = $color;
          }
        }
      endforeach;
      // Lấy số lượng màu sắc có sẵn
      $color_count = count($colors);
      ?> <p>Số màu có sẵn: <?php echo $color_count; ?></p>
    </div>
  <?php endif; ?>
</div>