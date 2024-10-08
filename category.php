<?php get_header(); ?>

<section class="section page-sidebar">
  <div class="page-sidebar__content cat-cat">
    <div class="page-sidebar__cat">
      <h1 class="page-sidebar__cat-title">
        <?php single_cat_title(); ?> 
      </h1>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('components/article-list'); ?>
    <?php endwhile; ?>
  </div>
</section>

<?php get_template_part('components/category-nav'); ?>

<?php  else: ?>
	<?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?>
<?php endif; ?>

<?php get_footer(); ?>


<?php
/*
Template Name: debate
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title"><?php echo single_cat_title(); ?></h1>
</div>
<div class="debate__meta">
  <div class="debate__col">Bote del mes: <span>500 euros</span> (1 de noviembre)</div>
  <div class="debate__col"><a href="https://dev.watchoutfreedom.com/wp-content/uploads/sites/3/2024/09/Normas.pdf" target="_blank">Ver reglas [PDF]</a></div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
  <?php echo do_shortcode('[ajax_load_more id="8488605913" loading_style="infinite ring" post_type="post" posts_per_page="8" category="'.get_query_var('category_name').'" transition_container_classes="wrap__box--debate"]')?>
  </div>
</div>

<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
