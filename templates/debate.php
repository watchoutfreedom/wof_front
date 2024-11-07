<?php
/*
Template Name: debate
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Debate</h1>
  <div class="hero__description">Responde con tu propio artículo a las publicaciones</div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
  <?php echo do_shortcode('[ajax_load_more id="8488605913" loading_style="infinite ring" post_type="post" posts_per_page="8" category="debate" transition_container_classes="wrap__box--debate"]')?>
  </div>
</div>

<?php get_template_part('components/instructions'); ?>
<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
