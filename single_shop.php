<?php get_header(); ?>    

<article class="product">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="product__content">
				<?php the_post_thumbnail('fotogrande'); ?>
				<div class="main single-noticias__main product__main">
					<div class="maincontent"><?php the_field('field_63752e3ee91da'); ?></div>
					<?php the_content("Sigue leyendo"); ?>
				</div>
			</div>
			<div class="product__sidebar">
				<div class="product__sticky">
					<h1 class="single-noticias__title">
						<?php the_title(); ?>
					</h1>
					<div class="product__precio"><?php the_field('field_6377e4e40ad0e'); ?> €</div>
					<div class="product__intro"><?php the_field('field_6375315c72e9d'); ?></div>
					<a href="<?php the_field('field_6377e4fc0ad0f'); ?>" class="product__btn">Comprar</a>
				</div>
			</div>
	

			<?php endwhile; else: ?>
    <?php include (TEMPLATEPATH . '/404.php'); ?>
  <?php endif; ?>
</article>

<?php get_template_part('components/list-shop'); ?>
<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>
