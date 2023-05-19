<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="body-content margin-head">
  <?php if (have_posts()) : ?>
  <!-- <p class="search-count"><php printf(esc_html__('Tìm thấy %d kết quả trả về', 'textdomain'), $wp_query->found_posts); ?></p> -->
  <p class="search-count">
    Tìm thấy <strong class="search-count-number"><?php echo $wp_query->found_posts; ?> kết quả </strong> trả về
  </p>
  <div class="product-list">
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <?php get_template_part('./components/product'); ?>
    </li>
    <?php endwhile; ?>
  </div>
  <?php else : ?>
  <p style="margin-top:-13px;">Không tìm thấy kết quả tìm kiếm</p>
  <h2 class="product-heading">CÓ THỂ BẠN QUAN TÂM</h2>
  <?php
    // Create a new WP_Query to get related products
    $args = array(
      'post_type' => 'product',
      'posts_per_page' => 4, // Change the number of related products to show here
      'orderby' => 'rand', // Show random products
      'post__not_in' => array(get_the_ID()), // Exclude the current product from the results
    );
    $related_products = new WP_Query($args);
    if ($related_products->have_posts()) :
    ?>
  <div class="product-list">
    <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
    <li>
      <?php get_template_part('./components/product'); ?>
    </li>
    <?php endwhile; ?>
  </div>
  <?php endif;
    wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>