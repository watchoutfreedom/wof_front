<?php
/*
Template Name: shop
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Tienda online</h1>
  <div class="hero__description">100% de lo recaudado va a impulsar iniciativas por la libertad de pensamiento y la cooperación social.</div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--shop">
    <?php $the_query = new WP_Query('showposts=24&category_name=tienda'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/product'); ?>
    <?php endwhile; ?>
  </div>
</div>
<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
