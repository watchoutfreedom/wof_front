<?php
/*
Template Name: debate
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Debate</h1>
  <div class="hero__description">Bote de este mes: 500 €</div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
    <?php $the_query = new WP_Query('showposts=12&category_name=debate'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/article-list'); ?>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
