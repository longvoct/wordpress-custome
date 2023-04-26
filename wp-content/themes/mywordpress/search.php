<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="body-content margin-head">
  <?php if (have_posts()) : ?>
  <div class="product-list">
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <div class="product-list__item">
        <a href="<?php the_permalink(); ?>">
          <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'product-list__image')); ?>
        </a>
        <h3 class="product-list__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="product-list__price"><?php echo $product->get_price_html(); ?></p>
        <span class="my-favorite">
          <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9 2.93125L8.19365 2.14542C6.29876 0.298738 2.82841 0.936208 1.5754 3.25636C0.986101 4.34755 0.853594 5.92263 1.92858 7.93341C2.9639 9.87001 5.11613 12.1882 9 14.7142C12.8839 12.1882 15.0361 9.87001 16.0714 7.93341C17.1464 5.92263 17.0139 4.34755 16.4246 3.25636C15.1716 0.936208 11.7012 0.298738 9.80635 2.14542L9 2.93125ZM9 16C-8.24977 5.19297 3.6886 -3.24359 8.80236 1.21929C8.86944 1.27783 8.93535 1.3386 9 1.4016C9.06465 1.3386 9.13055 1.27784 9.19763 1.2193C14.3114 -3.2436 26.2498 5.19296 9 16Z"
              fill="#575757" />
          </svg>
        </span>
      </div>
    </li>
    <?php endwhile; ?>
  </div>
  <?php else : ?>
  <p style="margin-top:-13px;">Không tìm thấy kết quả tìm kiếm. Có thể bạn quan tâm đến các sản phẩm sau:</p>
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
      <div class="product-list__item">
        <a href="<?php the_permalink(); ?>">
          <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'product-list__image')); ?>
        </a>
        <h3 class="product-list__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="product-list__price"><?php echo $product->get_price_html(); ?></p>
        <span class="my-favorite">
          <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9 2.93125L8.19365 2.14542C6.29876 0.298738 2.82841 0.936208 1.5754 3.25636C0.986101 4.34755 0.853594 5.92263 1.92858 7.93341C2.9639 9.87001 5.11613 12.1882 9 14.7142C12.8839 12.1882 15.0361 9.87001 16.0714 7.93341C17.1464 5.92263 17.0139 4.34755 16.4246 3.25636C15.1716 0.936208 11.7012 0.298738 9.80635 2.14542L9 2.93125ZM9 16C-8.24977 5.19297 3.6886 -3.24359 8.80236 1.21929C8.86944 1.27783 8.93535 1.3386 9 1.4016C9.06465 1.3386 9.13055 1.27784 9.19763 1.2193C14.3114 -3.2436 26.2498 5.19296 9 16Z"
              fill="#575757" />
          </svg>
        </span>
      </div>
    </li>
    <?php endwhile; ?>
  </div>
  <?php endif;
    wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>