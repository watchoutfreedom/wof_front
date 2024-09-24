<?php get_header(); ?>    
<main id="post">
	<article class="single-default">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="single-default__content">
				<div class="single-hero">
					<header class="header">
							<div class="header__wrap">
								<div class="header__logo">
									<a href="<?php bloginfo('url'); ?>" class="header__logo-link">
										WOF
									</a>
								</div>
								<div class="header__btn">
									<a href="">Colabora con WOF</a>
								</div>
							</div>
						</header>
						<div class="single-default__presentation">
							<div class="single-default__category">
								<?php get_template_part('atoms/category-link'); ?>
							</div>
							<h1 class="single-default__title">
								<?php the_title(); ?>
							</h1>
							<div class="single-default__intro">
								Un repaso al impacto que ha generado el uso de herramientas nocode, o lo que es lo mismo, herramientas que permiten a un usuario lanzar una web sin saber código
							</div>
						</div>
				</div>
				<div class="single-default__meta">
					<?php get_template_part('atoms/meta'); ?>
				</div>
				<div class="main single-default__main">
					<?php the_content("Sigue leyendo"); ?>
				</div>
				<div class="single__tags">
					<?php the_tags('<span>Palabras clave</span>', '', ''); ?>
				</div>
			</div>
		<?php endwhile; else: ?>
			<?php include (TEMPLATEPATH . '/404.php'); ?>
		<?php endif; ?>
	</article>
</main>

<?php get_template_part('components/last-posts'); ?>

<?php get_footer(); ?>
