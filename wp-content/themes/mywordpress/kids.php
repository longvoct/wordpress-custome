<?php
/*
Template Name: kids
*/ ?>
<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="kids-content body-content margin-head">
  <div class="sologan">
    <p>ĐI CÙNG THỜI TRANG</p>
    <div class="line"></div>
  </div>
  <div class="sologan">
    <div class="line"></div>
    <p>BỀN VỮNG CÙNG TUỔI THƠ</p>
  </div>
  <h2 class="product-heading">SẢN PHẨM NỔI BẬT</h2>
  <div class="featured-products-list">
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-1.jpg" alt=""></div>
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-2.jpg" alt=""></div>
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-3.jpg" alt=""></div>
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-4.jpg" alt=""></div>
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-5.jpg" alt=""></div>
    <div class="featured-product-item"><img class="featured-product-img"
        src="<?php bloginfo('template_directory'); ?>/images/men/men-6.jpg" alt=""></div>
  </div>
</div>

<div class="men-content body-content" style="margin-top: 80px;">
  <div class="block">
    <h3 class="block__title">Haretra ultrices varius placerat</h3>
    <span class="block__text">Lorem ipsum dolor sit amet consectetur. Sit non habitasse eu sed. Turpis erat sed
      egestas semper. Tincidunt ullamcorper faucibus sapien gravida. Et elementum in ac vitae. Mauris amet molestie
      neque quam. Odio donec sit mattis nibh porttitor enim sit</span>
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
            'terms' => 'Kids'
          )
        )
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
      $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'name',
            'terms' => 'Kids'
          )
        )
      );

      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 24,
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
        'terms' => 'Kids'
      );

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
      // Truy vấn sản phẩm và tính toán số trang dựa trên số lượng sản phẩm chia cho 12
      $products = new WP_Query(array_merge($query_args, $args));
      $total_pages = ceil($products->found_posts / 2);
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
    <!-- <div class="pagination">
      <a href="#" class="prev">&laquo;</a>
      <a href="#" class="page active">1</a>
      <a href="#" class="page">2</a>
      <a href="#" class="page">3</a>
      <a href="#" class="page">4</a>
      <a href="#" class="page">5</a>
      <a href="#" class="next">&raquo;</a>
    </div> -->
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
<?php get_footer() ?>