<?php get_header(); ?>    

<article class="product">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php the_post_thumbnail('fotogrande'); ?>

			<h1 class="single-noticias__title">
			<?php the_title(); ?>
      </h1>
			
			<?php bloginfo('get_cat_name'); ?>

			<div class="main single-noticias__main">
         <?php the_content("Sigue leyendo"); ?>
      </div>

			<?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
  <?php endif; ?>
</article>

<?php get_template_part('components/last-posts'); ?>

<?php get_footer(); ?>
