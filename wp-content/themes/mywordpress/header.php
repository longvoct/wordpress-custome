<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/resetcss.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sliderbanner.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/head-foot.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/product-detail.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/static_page.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/men.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/women.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/kids.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ti-wishlist.css" />
  <!-- Thêm thư viện jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Thêm thư viện Slick -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
  </script>
  <!-- Viết Jquery -->
  <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
  <!-- FlexSlider 2 -->

  <!-- Thư viện FlexSlider 2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
</head>

<body>

  <div class="header">
    <div class="logo">
      <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"
          alt="<?php bloginfo('name'); ?>" class="img-logo" /></a>
    </div>
    <!-- <ul class="menu__list">
      <li class="menu__item menu__item--active">
        <a class="menu__link" href="#">Trang chủ</a>
      </li>
    </ul> -->
    <?php wp_nav_menu(
      array(
        'theme_location' => 'header-menu',
        'container' => 'false',
        'menu_id' => 'header-menu',
        'menu_class' => 'menu__list'
      )
    ); ?>
    <div class="right-header">
      <div class="icons-list">
        <a href="<?php bloginfo('url'); ?>/tai-khoan" class="icon-header icon-user">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M11.999 12.7498C14.894 12.7498 17.249 10.3948 17.249 7.49976C17.249 4.60476 14.894 2.24976 11.999 2.24976C9.10396 2.24976 6.74896 4.60476 6.74896 7.49976C6.74896 10.3948 9.10396 12.7498 11.999 12.7498ZM11.999 3.74976C14.067 3.74976 15.749 5.43176 15.749 7.49976C15.749 9.56776 14.067 11.2498 11.999 11.2498C9.93096 11.2498 8.24896 9.56776 8.24896 7.49976C8.24896 5.43176 9.93096 3.74976 11.999 3.74976ZM19.749 17.9668V18.9778C19.749 19.9128 19.408 20.8088 18.788 21.4998C18.64 21.6658 18.4349 21.7498 18.2289 21.7498C18.0509 21.7498 17.8719 21.6867 17.7289 21.5587C17.4199 21.2827 17.395 20.8088 17.671 20.4998C18.044 20.0828 18.2499 19.5428 18.2499 18.9788V17.9678C18.2499 16.4538 17.2459 15.1437 15.8069 14.7827C15.5539 14.7187 15.282 14.7538 15.061 14.8788C13.16 15.9368 10.8339 15.9327 8.94495 14.8817C8.71895 14.7527 8.44697 14.7157 8.19397 14.7817C6.75497 15.1437 5.74994 16.4538 5.74994 17.9678V18.9788C5.74994 19.5438 5.95598 20.0838 6.32898 20.4998C6.60498 20.8088 6.57894 21.2827 6.27094 21.5587C5.96094 21.8357 5.48698 21.8087 5.21198 21.5007C4.59198 20.8087 4.25098 19.9128 4.25098 18.9788V17.9678C4.25098 15.7658 5.72194 13.8578 7.82794 13.3278C8.45094 13.1698 9.12795 13.2598 9.68195 13.5758C11.1119 14.3718 12.884 14.3748 14.326 13.5728C14.873 13.2608 15.55 13.1717 16.175 13.3287C18.278 13.8557 19.749 15.7638 19.749 17.9668Z"
              fill="#212121" />
          </svg>
        </a>
        <a href="<?php bloginfo('url'); ?>/yeu-thich" class=" icon-header icon-heart">
          <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M11 4.36803L10.1041 3.49488C7.99863 1.44301 4.14268 2.15131 2.75045 4.72927C2.09567 5.9417 1.94844 7.69178 3.14286 9.92599C4.29322 12.0778 6.68459 14.6536 11 17.4602C15.3154 14.6536 17.7068 12.0778 18.8571 9.92599C20.0516 7.69178 19.9043 5.9417 19.2496 4.72927C17.8573 2.15131 14.0014 1.44301 11.8959 3.49488L11 4.36803ZM11 18.8889C-8.16641 6.88105 5.09845 -2.49291 10.7804 2.46585C10.8549 2.5309 10.9282 2.59841 11 2.66842C11.0718 2.59842 11.1451 2.5309 11.2196 2.46586C16.9015 -2.49292 30.1664 6.88104 11 18.8889Z"
              fill="#212121" stroke="#212121" stroke-width="0.3" />
          </svg>
        </a>
        <div class="icon-bag_wrapper">
          <a href="<?php bloginfo('url'); ?>/gio-hang" class="icon-header icon-bag">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3.9 5.73333L5.08557 14.275C5.22282 15.2638 6.06825 16 7.06658 16L17.8334 16C18.8317 16 19.6772 15.2638 19.8144 14.275L20.7632 7.43955C20.8883 6.53778 20.1878 5.73333 19.2774 5.73333L3.9 5.73333ZM3.9 5.73333L3.60486 3.4136C3.50205 2.60558 2.81454 2 2 2V2"
                stroke="#121219" stroke-width="1.5" />
              <path
                d="M9 20.5C9 19.6716 8.32843 19 7.5 19C6.67157 19 6 19.6716 6 20.5C6 21.3284 6.67157 22 7.5 22C8.32843 22 9 21.3284 9 20.5Z"
                stroke="#121219" stroke-width="1.5" />
              <path
                d="M19 20.5C19 19.6716 18.3284 19 17.5 19C16.6716 19 16 19.6716 16 20.5C16 21.3284 16.6716 22 17.5 22C18.3284 22 19 21.3284 19 20.5Z"
                stroke="#121219" stroke-width="1.5" />
            </svg>
            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <script>
            jQuery(document).ready(function($) {
              var cart_count_element = $('.icon-bag .cart-count');
              if (cart_count_element.text() === '0') {
                cart_count_element.hide();
              }
              $(document.body).on('added_to_cart removed_from_cart', function() {
                $.ajax({
                  url: wc_cart_fragments_params.ajax_url,
                  type: 'POST',
                  data: {
                    action: 'woocommerce_get_refreshed_fragments'
                  },
                  success: function(data) {
                    if (data && data.fragments) {
                      // Cập nhật lại giỏ hàng
                      $.each(data.fragments, function(key, value) {
                        $(key).replaceWith(value);
                      });
                      // Cập nhật lại số lượng sản phẩm trong giỏ hàng
                      var cart_count = <?php echo WC()->cart->get_cart_contents_count(); ?>;
                      if (cart_count === 0) {
                        cart_count_element.hide();
                      } else {
                        cart_count_element.text(cart_count).show();
                      }
                    }
                  }
                });
              });
            });
            jQuery(document).ready(function($) {
              var cart_count = <?php echo WC()->cart->get_cart_contents_count(); ?>;
              var cart_count_element = $('.icon-bag .cart-count');
              if (cart_count === 0) {
                cart_count_element.hide();
              } else {
                cart_count_element.text(cart_count);
              }
              $(document.body).on('added_to_cart removed_from_cart', function() {
                var cart_count = <?php echo WC()->cart->get_cart_contents_count(); ?>;
                if (cart_count === 0) {
                  cart_count_element.hide();
                } else {
                  cart_count_element.text(cart_count).show();
                }
              });
            });
            </script>
          </a>
          <div class="triangle"></div>
          <div class="mini-cart-container">
            <?php
            include('woocommerce/cart/mini-cart.php');
            ?>
          </div>
        </div>

      </div>
      <form role="search" method="get" class="search-form input-wrapper" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" class="input-search"
          placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>"
          value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit icon-header icon-search">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M8.50385 14.7577C11.9578 14.7577 14.7577 11.9578 14.7577 8.50385C14.7577 5.04994 11.9578 2.25 8.50385 2.25C5.04994 2.25 2.25 5.04994 2.25 8.50385C2.25 11.9578 5.04994 14.7577 8.50385 14.7577Z"
              stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15.75 15.75L13.5 13.5" stroke="#212121" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </form>
    </div>
    <div class="progress-bar"></div>
  </div>