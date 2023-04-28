<?php
$args = array(
  'post_type' => 'slider',
  'posts_per_page' => -1,
);
$slider_query = new WP_Query($args);
?>
<div class="slider-banner">
  <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
    <div class="slider-banner_slide">
      <?php the_post_thumbnail('full'); ?>
      <!-- <h2><php the_title(); ?></h2> -->
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.slider-banner').slick({
      arrows: true,
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear'
    });
  });
</script>