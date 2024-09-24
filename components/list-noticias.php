<div class="wrap">
    <div class="wrap__box">
      <h3 class="wrap__title">Más noticias</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=noticias'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <div class="home__post">
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
    </div>
</div>