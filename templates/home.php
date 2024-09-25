<?php
/*
Template Name: home
*/
get_header();
?>
<div class="home">
<div class="hero">
    <h1 class="hero__title">WOF! es una asociación</h1>
    <div class="hero__description">Dedicada a fomentar la cooperación social, el debate y la formación en materias afectadas por la desinformación o el desinterés del statu quo.</div>
  </div>
  <div class="wrap">
    <div class="wrap__box">
      <h3 class="wrap__title">Debate</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=debate'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <div class="home__post">
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="wrap__box">
      <h3 class="wrap__title">Formaciones</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=formacion'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <div class="home__post">
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="wrap">
    <div class="wrap__box wrap__box--shop">
      <h3 class="wrap__title">Tienda</h3>
      <?php $the_query = new WP_Query('showposts=8&category_name=tienda'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/product'); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>
