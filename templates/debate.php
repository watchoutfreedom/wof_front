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
    <?php echo do_shortcode('[ajax_load_more id="5545649519" loading_style="infinite classic" post_type="post" posts_per_page="5"]')?>
  </div>
</div>
<?php 
?>
<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
