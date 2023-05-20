  <?php
  /*
  Template Name: men
  */ ?>
  <?php get_header(); ?>
  <?php get_template_part('./components/breadcrumb'); ?>
  <div class="line"></div>
  <div class="flex-content">
    <div class="flex-3">
      <div class="shoe-type">
        <span class="tag-type">Phong cách giày</span>
      </div>

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
        );

        $args = array(
          'post_type'      => 'product',
          'posts_per_page' => 24,
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
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span>Nổi bật</span>
            </button>
            <span class="icon-filter">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter"
                viewBox="0 0 16 16">
                <path
                  d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
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

        $args = array(
          'post_type'      => 'product',
          'posts_per_page' => 24,
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

        $total_pages = ceil($products->found_posts / 24);
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
        <?php
        // Lấy giá trị của biến $current_page từ URL
        $current_page = max(1, get_query_var('paged'));

        // Cấu hình các tham số cho hàm paginate_links
        $args = array(
          'base'         => get_pagenum_link(1) . '%_%',
          'format'       => 'page/%#%',
          'current'      => $current_page,
          'total'        => $total_pages,
          'prev_text'    => '&laquo;',
          'next_text'    => '&raquo;',
          'type'         => 'list',
          'end_size'     => 2,
          'mid_size'     => 2,
        );

        // Hiển thị phân trang
        echo paginate_links($args);
        ?>
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