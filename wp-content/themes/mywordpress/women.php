<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="women-content body-content margin-head">
  <div>
    <h3 class="block__title" style="text-align: left; margin-bottom: 15px;">Converse - Sự lựa chọn hoàn hảo cho những
      người phụ nữ táo bạo, tự tin</h3>
    <span class="block__text">Converse là biểu tượng của sự độc đáo và sáng tạo, giúp bạn thể hiện phong cách của mình
      một cách tuyệt vời. Với sự kết hợp của chất liệu và màu sắc đa dạng, giày Converse là sự lựa chọn hoàn hảo cho
      những người phụ nữ luôn muốn thể hiện sự nổi bật trong mọi hoàn cảnh.</span>
  </div>
  <div class="gallery-wom-img">
    <div class="slider-women">
      <div class="slider-women__slides">
        <div class="slider-women__slide">
          <img src="<?php bloginfo('template_directory'); ?>/images/women/women-1.webp" alt="">
        </div>
        <div class="slider-women__slide">
          <img src="<?php bloginfo('template_directory'); ?>/images/women/women-2.webp" alt="">
        </div>
        <div class="slider-women__slide">
          <img src="<?php bloginfo('template_directory'); ?>/images/women/women-3.webp" alt="">
        </div>
        <div class="slider-women__slide">
          <img src="<?php bloginfo('template_directory'); ?>/images/women/women-4.webp" alt="">
        </div>
        <div class="slider-women__slide">
          <img src="<?php bloginfo('template_directory'); ?>/images/women/women-5.webp" alt="">
        </div>
      </div>
      <div class="slider-women__arrows">
        <button class="slider-women__arrow slider-women__arrow--prev"><svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="14" cy="14" r="14" transform="matrix(-1 0 0 1 28.5 0)" fill="#212121" />
            <path d="M16.4344 19.4668C16.7859 19.7725 17.3089 19.7723 17.6602 19.4664C18.0982 19.085 18.0857 18.4001 17.636 18.0326C16.0848 16.7649 12.9935 14.2064 13.0553 14C13.1171 13.7941 16.1332 11.2466 17.6491 9.97598C18.0947 9.60247 18.1105 8.9267 17.6715 8.54545C17.3165 8.23722 16.7796 8.22955 16.425 8.53817L11.6028 12.7351C11.2168 13.0706 11 13.5256 11 14C11 14.4744 11.2168 14.9294 11.6028 15.2649L16.4344 19.4668Z" fill="white" />
          </svg>
        </button>
        <button class="slider-women__arrow slider-women__arrow--next"><svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="14" cy="14" r="14" transform="matrix(1 0 0 -1 0.5 28)" fill="#212121" />
            <path d="M12.5656 8.53318C12.2141 8.2275 11.6911 8.22768 11.3398 8.5336C10.9018 8.91503 10.9143 9.59991 11.364 9.96744C12.9152 11.2351 16.0065 13.7936 15.9447 14C15.8829 14.2059 12.8668 16.7534 11.3509 18.024C10.9053 18.3975 10.8895 19.0733 11.3285 19.4545C11.6835 19.7628 12.2204 19.7705 12.575 19.4618L17.3972 15.2649C17.7832 14.9294 18 14.4744 18 14C18 13.5256 17.7832 13.0706 17.3972 12.7351L12.5656 8.53318Z" fill="white" />
          </svg>
        </button>
      </div>
    </div>
    <div class="img-right">
      <div class="img-right_top">
        <img src="<?php bloginfo('template_directory'); ?>/images/women/women-6.webp" alt="">
        <img src="<?php bloginfo('template_directory'); ?>/images/women/women-7.webp" alt="">
      </div>
      <div class="img-right_bottom">
        <img src="<?php bloginfo('template_directory'); ?>/images/women/women-8.webp" alt="">
      </div>
    </div>
  </div>
</div>


<img class="line-img" src="<?php bloginfo('template_directory'); ?>/images/women/line.png" alt="">

<div class="line"></div>
<div class="flex-content">
  <div class="flex-3">
    <?php
    // Hiển thị shortcode
    echo do_shortcode('[yith_wcan_filters slug="filter-products"]');
    // Đoạn mã PHP của bạn ở đây
    ?>
  </div>
  <div class="flex-9">
    <div class="flex-9_top-right">
      <?php
      $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'name',
            'terms' => 'Women'
          )
        )
      );

      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 48,
      );
      // Truy vấn sản phẩm và tính toán số trang dựa trên số lượng sản phẩm chia cho xx
      $products = new WP_Query(array_merge($query_args, $args));
      ?>
      <?php if ($products->have_posts()) : ?>
        <span style="font-weight: 600;"><?php echo $products->found_posts; ?> kết quả tìm thấy</span>
      <?php else : ?>
        <span style="font-weight: 600;">Không có kết quả nào được tìm thấy.</span>
      <?php endif; ?>
      <!-- Loading -->
      <div class="dashed-loading" style="display: none;"></div>
      <!-- Filter -->
      <div class="product-filter">
        <label for="sort-by">Lọc theo:</label>
        <div class="dropdown">
          <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Nổi bật</span>
          </button>
          <span class="icon-filter">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
              <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
            </svg>
          </span>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="sort-by">
            <li data-value="position"><a href="#">Nổi bật</a></li>
            <li data-value="revenue"><a href="#">Phổ biến</a></li>
            <li data-value="date"><a href="#">Từ mới đến cũ</a></li>
            <li data-value="price_asc"><a href="#">Giá thấp đến cao</a></li>
            <li data-value="price_desc"><a href="#">Giá cao đến thấp</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="product-list" style="grid-template-columns: repeat(3, minmax(0, 1fr));">
      <?php
      $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'name',
            'terms' => 'Women'
          )
        )
      );

      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 48,
      );

      if (isset($_GET['filter_color']) && isset($_GET['filter_size'])) {
        // If both color and size are selected, filter by both
        $query_args['tax_query'] = array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'pa_color',
            'field' => 'slug',
            'terms' => explode(',', $_GET['filter_color']),
            'operator' => isset($_GET['query_type_color']) ? $_GET['query_type_color'] : 'IN'
          ),
          array(
            'taxonomy' => 'pa_size',
            'field' => 'slug',
            'terms' => explode(',', $_GET['filter_size']),
            'operator' => isset($_GET['query_type_size']) ? $_GET['query_type_size'] : 'IN'
          )
        );
      } elseif (isset($_GET['filter_color'])) {
        // If only color is selected, filter by color
        $query_args['tax_query'] = array(
          array(
            'taxonomy' => 'pa_color',
            'field' => 'slug',
            'terms' => explode(',', $_GET['filter_color']),
            'operator' => isset($_GET['query_type_color']) ? $_GET['query_type_color'] : 'IN'
          )
        );
      } elseif (isset($_GET['filter_size'])) {
        // If only size is selected, filter by size
        $query_args['tax_query'] = array(
          array(
            'taxonomy' => 'pa_size',
            'field' => 'slug',
            'terms' => explode(',', $_GET['filter_size']),
            'operator' => isset($_GET['query_type_size']) ? $_GET['query_type_size'] : 'IN'
          )
        );
      }

      // Lọc sản phẩm chỉ trong phạm vi danh mục "Men"
      $query_args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field' => 'name',
        'terms' => 'Women'
      );

      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 48,
      );
      // Sắp xếp sản phẩm
      if (isset($_GET['sort_by'])) {
        switch ($_GET['sort_by']) {
          case 'revenue':
            $args['meta_key'] = 'total_sales';
            $args['orderby'] = 'meta_value_num';
            break;
          case 'date':
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
          case 'price_asc':
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order'] = 'ASC';
            break;
          case 'price_desc':
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order'] = 'DESC';
            break;
          default:
            $args['orderby'] = 'menu_order';
            $args['order'] = 'ASC';
            break;
        }
      } else {
        $args['meta_key'] = 'total_sales'; // Sắp xếp sản phẩm theo mức độ phổ biến
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
      }
      // Truy vấn sản phẩm
      // Truy vấn sản phẩm và tính toán số trang dựa trên số lượng sản phẩm chia cho 12
      $products = new WP_Query(array_merge($query_args, $args));
      if ($products->have_posts()) {
        while ($products->have_posts()) {
          $products->the_post();
          global $product;
          wc_get_template_part('/components/product');
        }
      }
      wp_reset_postdata();
      ?>
    </div>
    <div class="pagination">
      <?php wp_pagenavi(array('query' => $products)); ?>
    </div>
  </div>
</div>
<script>
  jQuery(document).ready(function($) {
    // Lấy giá trị ban đầu của dropdown
    var sortBy = $('#sort-by li[data-value="' + $('#sort-by').data('value') + '"]').data('value');

    // Thêm sự kiện "mousedown" cho dropdown-toggle
    $('.dropdown-toggle').on('mousedown', function(e) {
      e.preventDefault();
      var dropdownMenu = $(this).parent().find('.dropdown-menu');
      if (dropdownMenu.is(':hidden')) {
        dropdownMenu.show();
      } else {
        dropdownMenu.hide();
      }
    });

    // Thêm sự kiện "click" cho các mục trong dropdown-menu
    $('#sort-by').on('click', 'a', function(e) {
      e.preventDefault();
      var newSortBy = $(this).parent().data('value');
      if (newSortBy !== sortBy) {
        sortBy = newSortBy;
        // Hiển thị icon loading
        $('.dashed-loading').show();
        // Gửi yêu cầu AJAX để lọc sản phẩm
        $.ajax({
          type: 'GET',
          url: window.location.href,
          data: {
            sort_by: sortBy
          },
          success: function(data) {
            // Cập nhật danh sách sản phẩm
            var productList = $(data).find('.product-list');
            $('.product-list').html(productList.html());
            // Cập nhật URL với giá trị mới của dropdown
            var newUrl = updateQueryStringParameter(window.location.href, 'sort_by', sortBy);
            window.history.pushState({
              path: newUrl
            }, '', newUrl);
          },
          complete: function() {
            // Ẩn icon loading khi yêu cầu AJAX hoàn thành
            $('.dashed-loading').hide();
          }
        });
      }
      // Ẩn dropdown-menu khi người dùng chọn mục
      $('.dropdown-menu').hide();
      // Cập nhật nội dung của dropdown-toggle
      $(this).closest('.dropdown').find('.dropdown-toggle').html($(this).html());
    });

    // Hàm cập nhật giá trị của tham số "sort_by" trong URL
    function updateQueryStringParameter(uri, key, value) {
      var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
      var separator = uri.indexOf('?') !== -1 ? "&" : "?";
      if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
      } else {
        return uri + separator + key + "=" + value;
      }
    }

    // Ẩn dropdown-menu khi người dùng click bên ngoài dropdown
    $(document).on('mousedown', function(e) {
      if (!$(e.target).closest('.dropdown').length) {
        $('.dropdown-menu').hide();
      }
    });
  });
</script>
<?php get_footer() ?>