<?php
/*
Template Name: formacion
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Formaciones</h1>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--shop">
    <?php $the_query = new WP_Query('showposts=24&category_name=formacion'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/product'); ?>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
