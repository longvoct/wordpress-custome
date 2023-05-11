<?php
/*
Template Name: men
*/ ?>
<?php get_header(); ?>
<?php get_template_part('./components/breadcrumb'); ?>
<div class="body-content margin-head">
  <h2 class="product-heading">SẢN PHẨM NỔI BẬT</h2>
</div>
</div>

</div>
<img class="line-img" src="<?php bloginfo('template_directory'); ?>/images/men/line.png" alt="">
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
      <span style="font-weight: 600;"><?php echo $wp_query->found_posts; ?> kết quả tìm thấy</span>
      <label for="">Lọc theo</label>
    </div>
    <div class="product-list" style="grid-template-columns: repeat(3, minmax(0, 1fr));">
      <?php
      $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
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

      $query = new WP_Query($query_args);
      if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
          wc_get_template_part('/components/product');
        endwhile;
        wp_reset_postdata();
      } else {
        echo '<p>Không tìm thấy sản phẩm nào.</p>';
      }
      ?>
    </div>
    <div class="pagination">
      <a href="#" class="prev">&laquo;</a>
      <a href="#" class="page active">1</a>
      <a href="#" class="page">2</a>
      <a href="#" class="page">3</a>
      <a href="#" class="page">4</a>
      <a href="#" class="page">5</a>
      <a href="#" class="next">&raquo;</a>
    </div>
  </div>
</div>
<?php get_footer() ?>