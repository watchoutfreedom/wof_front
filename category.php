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
