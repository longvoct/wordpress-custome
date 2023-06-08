<?php get_header(); ?>
<div class="landing-page" style="margin-top: 70px" data-aos="fade-up" data-aos-duration="500">
  <!-- <img src="<php bloginfo('template_directory'); ?>/images/banner-test.png" alt="" class="banner-test"> -->
  <?php get_template_part('slider'); ?>
</div>

<div class="body-content">
  <div class="block">
    <h3 class="block__title" data-aos="fade-right" data-aos-duration="500">Be Bold. Be Authentic. Be Yourself with
      Converse.</h3>
    <span class="block__text" data-aos="fade-left" data-aos-duration="800">Converse - the perfect companion for your
      creative journey</span>
  </div>

  <!-- Product List -->
  <h2 class="product-heading">SẢN PHẨM NỔI BẬT</h2>
  <div class="product-list" data-aos="fade-up" data-aos-duration="1000">
    <!-- Code woo -->
    <?php
    $tax_query[] = array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',
      'operator' => 'IN',
    );
    ?>
    <?php $args = array('post_type' => 'product', 'posts_per_page' => 28, 'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
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
    <div class="gallery__item gallery__item--men" data-aos="fade-down" data-aos-duration="800">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/men.webp" alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nam</h3>
        <p class="gallery__desc">Phù hợp với nhiều sở thích và nhu cầu của phái nam, từ những mẫu cổ điển cho đến
          những kiểu mới nhất, đã sẵn sàng để bạn có thể mua sắm.</p>
        <a href="<?php bloginfo('url'); ?>/giay-nam"><button class="gallery__button">Khám phá</button></a>
      </div>
    </div>
    <div class="gallery__item gallery__item--women" data-aos="fade-down" data-aos-duration="1000">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/women.webp"
        alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers dành cho Nữ</h3>
        <p class="gallery__desc">Tôn vinh vóc dáng xinh đẹp của phái nữ với các mẫu thiết kế giày dép thời trang và hiện
          đại. Tự hào cung cấp những sản phẩm chất lượng nhất.</p>
        <a href="<?php bloginfo('url'); ?>/giay-nu"><button class="gallery__button">Khám phá</button></a>
      </div>
    </div>
    <div class="gallery__item gallery__item--kids" data-aos="fade-down" data-aos-duration="800">
      <img class="gallery__item-image" src="<?php bloginfo('template_directory'); ?>/images/kids.webp"
        alt="men-product">
      <div class="gallery__opacity"></div>
      <div class="gallery__content">
        <h3 class="gallery__caption">Sneakers cho trẻ em</h3>
        <p class="gallery__desc">Cung cấp những sản phẩm với chất liệu mềm mại, thiết kế êm ái và độ bền cao. Mang lại
          cảm giác thoải mái và tự tin khi hoạt động.</p>
        <a href="<?php bloginfo('url'); ?>/giay-tre-em"><button class="gallery__button">Khám phá</button></a>
      </div>
    </div>
  </div>

  <!-- Product New Arrivals. -->
  <h2 class="product-heading">SẢN PHẨM MỚI VỀ</h2>
  <div class="product-list" data-aos="fade-up" data-aos-duration="1000">
    <?php
    $args = array(
      'post_type' => 'product',
      'posts_per_page' => 28,
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

  <!-- Fashion trendind -->
  <div class="fashion-trending" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800"
    style="margin-top: 60px;">
    <img class="fashion-trending__image" src="<?php bloginfo('template_directory'); ?>/images/banner.webp" alt="">
    <div class="fashion-trending__content">
      <span>XU HƯỚNG THỜI TRANG</span>
      <p>Thăng hạng phong cách của bạn với những sản phẩm </br> chất lượng, đẹp và độc đáo từ chúng tôi</p>
      <a href="<?php bloginfo('url'); ?>/cua-hang"><button>Mua sắm ngay</button></a>
    </div>
  </div>
  <!-- Color -->
  <div class="banner-colors" style="margin-top: 60px;">
    <a href="http://converse.azdigi.shop/cua-hang/?yith_wcan=1&filter_mau-chu-dao=white&query_type_mau-chu-dao=and">
      <div class="banner-color" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <img class="banner-color__image" src="<?php bloginfo('template_directory'); ?>/images/Converse-White.jpg"
          alt="">
        <span>Trắng</span>
      </div>
    </a>
    <a href="http://converse.azdigi.shop/cua-hang/?yith_wcan=1&filter_mau-chu-dao=black&query_type_mau-chu-dao=and">
      <div class="banner-color" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <img class="banner-color__image" src="<?php bloginfo('template_directory'); ?>/images/Converse-Black.jpg"
          alt="">
        <span style="color:#fff">Đen</span>
      </div>
    </a>
    <a href="http://converse.azdigi.shop/cua-hang/?yith_wcan=1&filter_mau-chu-dao=pink&query_type_mau-chu-dao=and">
      <div class="banner-color" data-aos="fade-left" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <img class="banner-color__image" src="<?php bloginfo('template_directory'); ?>/images/Converse-Pink.jpg" alt="">
        <span style="color:#fff">Hồng</span>
      </div>
    </a>
    <a href="http://converse.azdigi.shop/cua-hang/?yith_wcan=1&filter_mau-chu-dao=blue&query_type_mau-chu-dao=and">
      <div class="banner-color" data-aos="fade-left" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <img class="banner-color__image" src="<?php bloginfo('template_directory'); ?>/images/Converse-Blue.jpg" alt="">
        <span>Xanh dương</span>
      </div>
    </a>

  </div>
  <!-- Banner-product -->
  <div class="banner-product">
    <img class="banner-product__image" src="<?php bloginfo('template_directory'); ?>/images/banner-product-title.webp"
      alt="Product Image">
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