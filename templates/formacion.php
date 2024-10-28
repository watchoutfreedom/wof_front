<?php
/*
Template Name: formacion
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Divulgación</h1>
  <div class="hero__description">Charlas y cursos que ofrecemos, junto a colaboradores de la asociación, a entidades interesadas. Pregúntanos sobre ellas.</div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--shop">
    <?php $the_query = new WP_Query('showposts=24&category_name=divulgacion'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/product'); ?>
    <?php endwhile; ?>
  </div>
</div>
<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
