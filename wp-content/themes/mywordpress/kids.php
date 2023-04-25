<?php
/*
Template Name: kids
*/ ?>
<?php get_header(); ?>
<div class="kids-content body-content" style="margin-top: 120px;">
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
    <div class="shoe-type">
      <span class="tag-type">Loại giày</span>
      <div class="shoe-type_checkbox">
        <input type="checkbox" name="Chuck Taylor All Star" id="Chuck Taylor All Star">
        <label for="Chuck Taylor All Star">Chuck Taylor All Star</label>
      </div>
      <div class="shoe-type_checkbox">
        <input type="checkbox" name="Chuck Taylor II" id="Chuck Taylor II">
        <label for="Chuck Taylor II">Chuck Taylor II</label>
      </div>
      <div class="shoe-type_checkbox">
        <input type="checkbox" name="Jack Purcell" id="Jack Purcell">
        <label for="Jack Purcell">Jack Purcell</label>
      </div>
      <div class="shoe-type_checkbox">
        <input type="checkbox" name="One Star" id="One Star">
        <label for="One Star">One Star</label>
      </div>
      <div class="shoe-type_checkbox">
        <input type="checkbox" name="Chuck 70" id="Chuck 70">
        <label for="Chuck 70">Chuck 70</label>
      </div>
    </div>
    <div class="size-type">
      <span class="tag-type">Kích cỡ</span>
      <div class="sizes-list">
        <div class="size-item size-ative">37</div>
        <div class="size-item">36</div>
        <div class="size-item">38</div>
        <div class="size-item">39</div>
        <div class="size-item">40</div>
        <div class="size-item">41</div>
        <div class="size-item">42</div>
        <div class="size-item">43</div>
        <div class="size-item">44</div>
        <div class="size-item">45</div>
        <div class="size-item">46</div>
        <div class="size-item">47</div>
        <div class="size-item">48</div>
        <div class="size-item">49</div>
        <div class="size-item">50</div>
        <div class="size-item">51</div>
        <div class="size-item">52</div>
        <div class="size-item">53</div>
        <div class="size-item">54</div>
        <div class="size-item">55</div>
      </div>
    </div>
    <div class="color-type">
      <span class="tag-type">Màu sắc</span>
      <div class="colors-list">
        <div class="color-item color-active black"></div>
        <div class="color-item gray"></div>
        <div class="color-item white"></div>
        <div class="color-item violet"></div>
        <div class="color-item pink"></div>
        <div class="color-item red"></div>
        <div class="color-item orange"></div>
        <div class="color-item yellow"></div>
        <div class="color-item green"></div>
        <div class="color-item blue"></div>
      </div>
    </div>
    <div class="price-type">
      <span class="tag-type">Giá sản phẩm</span>
      <div class="price-type_checkbox">
        <input type="checkbox" name="price-1" id="price-1">
        <label for="price-1">Giá dưới 500.000đ</label>
      </div>
      <div class="price-type_checkbox">
        <input type="checkbox" name="price-2" id="price-2">
        <label for="price-3">500.000đ - 1.000.000đ</label>
      </div>
      <div class="price-type_checkbox">
        <input type="checkbox" name="price-3" id="price-3">
        <label for="price-3">1.000.000đ - 1.500.000đ</label>
      </div>
      <div class="price-type_checkbox">
        <input type="checkbox" name="price-4" id="price-4">
        <label for="price-4">1.500.000đ - 2.000.000đ</label>
      </div>
      <div class="price-type_checkbox">
        <input type="checkbox" name="price-4" id="price-4">
        <label for="price-4">Trên 2.000.000</label>
      </div>
    </div>
  </div>
  <div class="flex-9">
    <div class="flex-9_top-right">
      <span style="font-weight: 600;">85 kết quả tìm thấy</span>
      <label for="">Lọc theo</label>
    </div>
    <div class="product-list" style="grid-template-columns: repeat(3, minmax(0, 1fr));">
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