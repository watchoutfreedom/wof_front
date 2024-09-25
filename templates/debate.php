<?php
/*
Template Name: debate
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Debate</h1>
</div>
<div class="debate__meta">
  <div class="debate__col">Bote del mes: <span>500 euros</span> (1 de noviembre)</div>
  <div class="debate__col"><a href="https://dev.watchoutfreedom.com/wp-content/uploads/sites/3/2024/09/Normas.pdf" target="_blank">Ver reglas [PDF]</a></div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
    <?php $the_query = new WP_Query('showposts=12&category_name=debate'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/article-list'); ?>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
