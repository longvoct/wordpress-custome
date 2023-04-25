<?php get_header(); ?>
<div class="landing-page">
  <div></div>
</div>
<div class="body-content">
  <div class="block">
    <h3 class="block__title">Haretra ultrices varius placerat</h3>
    <span class="block__text">Lorem ipsum dolor sit amet consectetur. Sit non habitasse eu sed. Turpis erat sed
      egestas semper. Tincidunt ullamcorper faucibus sapien gravida. Et elementum in ac vitae. Mauris amet molestie
      neque quam. Nibh neque tincidunt at quis pharetra ultrices varius placerat. Lectus ac tortor vitae convallis
      pellentesque. Odio donec sit mattis nibh porttitor enim sit</span>
  </div>

  <!-- Product List -->
  <h2 class="product-heading">SẢN PHẨM NỔI BẬT</h2>
  <div class="product-list">
    <!-- Code woo -->
    <?php
    $tax_query[] = array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',
      'operator' => 'IN',
    );
    ?>
    <?php $args = array('post_type' => 'product', 'posts_per_page' => 12, 'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
    <?php $getposts = new WP_query($args); ?>
    <?php global $wp_query;
    $wp_query->in_the_loop = true; ?>
    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
    <?php global $product; ?>
    <div class="product-list__item">
      <a href="<?php the_permalink(); ?>">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'product-list__image')); ?>
      </a>
      <h3 class="product-list__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p class="product-list__price"><?php echo $product->get_price_html(); ?></p>
      <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ</a>
      <span class="my-favorite">
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M9 2.93125L8.19365 2.14542C6.29876 0.298738 2.82841 0.936208 1.5754 3.25636C0.986101 4.34755 0.853594 5.92263 1.92858 7.93341C2.9639 9.87001 5.11613 12.1882 9 14.7142C12.8839 12.1882 15.0361 9.87001 16.0714 7.93341C17.1464 5.92263 17.0139 4.34755 16.4246 3.25636C15.1716 0.936208 11.7012 0.298738 9.80635 2.14542L9 2.93125ZM9 16C-8.24977 5.19297 3.6886 -3.24359 8.80236 1.21929C8.86944 1.27783 8.93535 1.3386 9 1.4016C9.06465 1.3386 9.13055 1.27784 9.19763 1.2193C14.3114 -3.2436 26.2498 5.19296 9 16Z"
            fill="#575757" />
        </svg>
      </span>
    </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
    <!-- <div class="product-list__item">
      <img class="product-list__image" src="<?php bloginfo('template_directory'); ?>/images/img-1.png" alt="Product Image">
      <h3 class="product-list__name">Giày Converse Chuck Taylor All Star Desert Floral - A00835C</h3>
      <p class="product-list__price">1.700.000₫</p>
    </div> -->

  </div>

  <!-- Gallery -->
  <div class="gallery">
    <div class="gallery__item gallery__item--men">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/men.png" alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nam</h3>
        <p class="gallery__desc">Phù hợp với nhiều sở thích và nhu cầu của phái nam, từ những mẫu cổ điển cho đến
          những kiểu mới nhất, đã sẵn sàng để bạn có thể mua sắm.</p>
        <button class="gallery__button">Khám phá</button>
      </div>
    </div>
    <div class="gallery__item gallery__item--women">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/women.png"
        alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nam</h3>
        <p class="gallery__desc">Phù hợp với nhiều sở thích và nhu cầu của phái nam, từ những mẫu cổ điển cho đến
          những kiểu mới nhất, đã sẵn sàng để bạn có thể mua sắm.</p>
        <button class="gallery__button">Khám phá</button>
      </div>
    </div>
    <div class="gallery__item gallery__item--kids">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/kids.png" alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nam</h3>
        <p class="gallery__desc">Phù hợp với nhiều sở thích và nhu cầu của phái nam, từ những mẫu cổ điển cho đến
          những kiểu mới nhất, đã sẵn sàng để bạn có thể mua sắm.</p>
        <button class="gallery__button">Khám phá</button>
      </div>
    </div>
  </div>

  <!-- Product New Arrivals. -->
  <h2 class="product-heading">SẢN PHẨM MỚI VỀ</h2>
  <div class="product-list">
    <?php
    $args = array(
      'post_type' => 'product',
      'posts_per_page' => 12,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $products = new WP_Query($args);

    if ($products->have_posts()) {
      while ($products->have_posts()) {
        $products->the_post();
        global $product;
    ?>
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
    <?php
      }
      wp_reset_postdata();
    } else {
      echo __('Không tìm thấy sản phẩm mới về', 'text-domain');
    }
    ?>

  </div>
  <!-- Banner-product -->
  <div class="banner-product">
    <img class="banner-product__image" src="<?php bloginfo('template_directory'); ?>/images/banner-product-title.png"
      alt="Product Image">
  </div>
</div>
<?php get_footer() ?>