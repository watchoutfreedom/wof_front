<?php
/*
Template Name: colabora
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Colabora</h1>
</div>

<main id="post">
	<article class="single-default">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="main single-default__main">
        <?php the_content("Sigue leyendo"); ?>
      </div>
		<?php endwhile; else: ?>
			<?php include (TEMPLATEPATH . '/404.php'); ?>
		<?php endif; ?>
	</article>
</main>


<?php get_footer(); ?>
