<?php
/*
Template Name: debate
*/
get_header();
?>
<h1 class="hero__title">
  <?php echo get_avatar(get_the_author_ID(), 64); ?>
  <?php the_author(); ?> (<?php the_author_posts(); ?>)
</h1>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
  <?php echo do_shortcode('[ajax_load_more id="8488605913" loading_style="infinite ring" author="'.get_the_author_ID().'" post_type="post" posts_per_page="8" category="debate" transition_container_classes="wrap__box--debate"]')?>
  </div>
</div>

<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
