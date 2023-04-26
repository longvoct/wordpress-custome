<?php get_header(); ?>

<div class="body-content" style="margin-top:100px">
  <h2>Không tìm thấy trang</h2>
  <p style="margin-top:10px">Trang bạn đang tìm kiếm không tồn tại. Dưới đây là một số sản phẩm có thể bạn quan tâm.</p>
  <div class="product-list">
    <?php
    $args = array(
      'post_type' => 'product',
      'posts_per_page' => 8,
      'orderby' => 'rand'
    );

    $related_products = new WP_Query($args);

    if ($related_products->have_posts()) :
      while ($related_products->have_posts()) : $related_products->the_post(); ?>
        <?php get_template_part('product'); ?>
    <?php endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</div>

<?php get_footer(); ?>