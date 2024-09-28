<meta http-equiv="Refresh" content="0; url='https://wofreedom.org'" />
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="page">
	<section class="page-title">
		<h1>
			<?php the_title(); ?>
		</h1>
	</section>
	<section class="page-text">
		<?php the_content("Sigue leyendo"); ?>     
	</section>
</article>
<?php endwhile; else: ?> 
	<?php include (TEMPLATEPATH . '/404.php'); ?>		
<?php endif; ?>

<?php get_footer(); ?>