<?php
$product_id = get_the_ID();
$product = wc_get_product($product_id);
?>

<div class="product-list__item">
  <a href="<?php the_permalink(); ?>">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'product-list__image')); ?>
  </a>
  <h3 class="product-list__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p class="product-list__price"><?php echo $product->get_price_html(); ?></p>
  <span class="my-favorite">
    <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
  </span>
</div>