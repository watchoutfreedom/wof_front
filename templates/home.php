<?php
/*
Template Name: home
*/
get_header();
?>
<div class="home">
<div class="hero">
    <h1 class="hero__title">Conoce el otro lado.</h1>
    <div class="hero__description">WOF! fomenta la cooperación social, el debate y el conocimiento en materias afectadas por la desinformación o el desinterés del statu quo.</div>
  </div>
  <div class="wrap">
    <div class="wrap__box wrap__box--author">
      <h3 class="wrap__title">Debate</h3>
      <?php $the_query = new WP_Query('showposts=3&category_name=debate'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <div class="home__post">
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="wrap__box wrap__box--author">
      <?php $the_query = new WP_Query('showposts=3&category_name=debate&offset=3'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <div class="home__post">
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  
  <div class="wrap">
    <div class="wrap__box wrap__box--news">
      <h3 class="wrap__title">Divulgación</h3>
      <?php $the_query = new WP_Query('showposts=6&category_name=divulgacion'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/card-formacion'); ?>
      <?php endwhile; ?>
    </div>
  </div>

  <div class="wrap">
    <div class="wrap__box wrap__box--shop">
      <h3 class="wrap__title">Tienda</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=tienda'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/card-product'); ?>
      <?php endwhile; ?>
    </div>
  </div>
  
  <div class="wrap">
    <div class="wrap__box wrap__box--news">
      <h3 class="wrap__title">Novedades WOF</h3>
      <?php $the_query = new WP_Query('showposts=12&category_name=noticias'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/card-noticia'); ?>
      <?php endwhile; ?>
    </div>
  </div>

</div>

<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
