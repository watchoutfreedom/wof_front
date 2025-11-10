<?php get_header(); ?>

<section class="section page-sidebar">
  <div class="page-sidebar__content">
    <h1 class="page-sidebar__title">
      <?php
      // Check if we are on the 'helpbuttons' category page
      if ( is_category('helpbuttons') ) {
        // If yes, display the image instead of the title
        echo '<img class="category-title-image" src="https://wofreedom.org/wp-content/uploads/sites/8/2025/11/hb_logo_hor_00.png" alt="' . single_cat_title('', false) . '">';
      } else {
        // Otherwise, display the normal category title
        single_cat_title();
      }
      ?>
    </h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('components/card-noticia'); ?>
    <?php endwhile; ?>
  </div>
</section>

<?php get_template_part('components/category-nav'); ?>

<?php else: ?>
  <?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?>
<?php endif; ?>

<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>