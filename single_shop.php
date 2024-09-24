<?php get_header(); ?>    

<article class="product">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="product__content">
				<?php the_post_thumbnail('fotogrande'); ?>
				<div class="main single-noticias__main product__main">
					<?php the_content("Sigue leyendo"); ?>
				</div>
			</div>
			<div class="product__sidebar">
				<div class="product__sticky">
					<h1 class="single-noticias__title">
						<?php the_title(); ?>
					</h1>
					<div>40,00 €</div>
					<a href="" class="product__btn">Comprar</a>
				</div>
			</div>
	

			<?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
  <?php endif; ?>
</article>

<?php get_template_part('components/last-posts'); ?>

<?php get_footer(); ?>
