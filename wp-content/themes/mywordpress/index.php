<?php get_header(); ?>
<div class="landing-page" style="margin-top: 70px">
  <img src="<?php bloginfo('template_directory'); ?>/images/banner-test.png" alt="" class="banner-test">
  <!-- <php get_template_part('slider'); ?> -->
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
      <?php get_template_part('./components/product'); ?>
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
        <a href="<?php bloginfo('url'); ?>/nam"><button class="gallery__button">Khám phá</button></a>
      </div>
    </div>
    <div class="gallery__item gallery__item--women">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/women.png" alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nữ</h3>
        <p class="gallery__desc">Tôn vinh vóc dáng xinh đẹp của phái nữ với các mẫu thiết kế giày dép thời trang và hiện
          đại. Tự hào cung cấp những sản phẩm chất lượng nhất.</p>
        <a href="<?php bloginfo('url'); ?>/nu"><button class="gallery__button">Khám phá</button></a>
      </div>
    </div>
    <div class="gallery__item gallery__item--kids">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/kids.png" alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers cho trẻ em</h3>
        <p class="gallery__desc">Cung cấp những sản phẩm với chất liệu mềm mại, thiết kế êm ái và độ bền cao. Mang lại
          cảm giác thoải mái và tự tin khi hoạt động.</p>
        <a href="<?php bloginfo('url'); ?>/nam"><button class="gallery__button">Khám phá</button></a>
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
        <?php get_template_part('/components/product'); ?>
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
    <img class="banner-product__image" src="<?php bloginfo('template_directory'); ?>/images/banner-product-title.png" alt="Product Image">
    <div class="banner-gallery__opacity"></div>
    <div class="banner-product__content">
      <span>One Star Pro Sean Pablo </br>
        X Paradise </span>
      <span>A BOLD VISION </span>
      <p>The CONS pro, Sean Pablo, brings his unique creativity to your favorite performance skate sho nae, finds
        unexpected color mash-ups inspired by ‘90s nostalgia.</p>
      <div class="banner-link_wrapper">
        <a href="<?php bloginfo('url'); ?>/cua-hang">
          <button class="banner-link_store">
            Cửa hàng
          </button>
        </a>
      </div>
    </div>
    <div class="banner-deco_list">
      <img class="banner-deco_first" src="<?php bloginfo('template_directory'); ?>/images/converse-cons.png" alt="">
      <span>PORTLAND </br> OREGON</span>
      <img class="banner-deco_sec" src="<?php bloginfo('template_directory'); ?>/images/edieCernicky.png" alt="">
    </div>
  </div>
</div>
<?php get_footer() ?>