<?php
/*
Template Name: men
*/ ?>
<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="body-content margin-head">
  <h2 class="product-heading">SẢN PHẨM NỔI BẬT</h2>
  <?php
  $args = array(
    'post_type' => 'product',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 8,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'name',
        'terms' => 'Men'
      )
    )
  );

  $products = get_posts($args);

  if ($products) {
    echo '<ul class="featured-products-list">';
    foreach ($products as $product) {
      $product_id = $product->ID;
      $product_link = get_permalink($product_id);
      $product_title = get_the_title($product_id);
      $image_url = get_the_post_thumbnail_url($product_id, 'medium');
      echo '<li class="featured-product-item">
      <div class="featured__opacity"></div>
      <a href="' . $product_link . '"><img class="featured-product-img" src="' . $image_url . '" alt="">
     <button class="featured-product-button">Xem ngay <span>
     <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.5C0 3.35786 3.35786 0 7.5 0C11.6421 0 15 3.35786 15 7.5C15 11.6421 11.6421 15 7.5 15C3.35786 15 0 11.6421 0 7.5ZM10.1973 6.24886C11.1654 6.80207 11.1654 8.19801 10.1973 8.75123L6.86549 10.6551C5.97862 11.1619 4.87515 10.5215 4.87515 9.50004L4.87515 5.50004C4.87515 4.47859 5.97863 3.83822 6.86549 4.345L10.1973 6.24886Z" fill="#323232"/>
</svg>
     </span>
     </button>
      <span class="featured-product-title" >' . $product_title . '</span>
      </a></li>';
    }
    echo '</ul>';
  }
  ?>
</div>

<img class="line-img" src="<?php bloginfo('template_directory'); ?>/images/men/line.png" alt="">
<div class="men-content body-content" style="margin-top: 80px;">
  <div class="block">
    <h3 class="block__title">Converse - Phong cách đích thực cho người đàn ông hiện đại</h3>
    <span class="block__text">Bạn là một người đàn ông mạnh mẽ và đang tìm kiếm một đôi giày phù hợp với phong cách của
      mình? Hãy chọn Converse! Với thiết kế đơn giản nhưng đầy phong cách, đôi giày Converse sẽ mang đến cho bạn sự tự
      tin và đầy mạnh mẽ. Hãy để Converse trở thành một phụ kiện không thể thiếu trong tủ đồ của bạn.</span>
  </div>
</div>
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
            'terms' => 'Men'
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
            'terms' => 'Men'
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
        'terms' => 'Men'
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