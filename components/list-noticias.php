
<section class="section page-sidebar section--related page-sidebar--reverse">
  <div class="page-sidebar__content">
    <h3 class="page-sidebar__title">
      Últimas noticias
    </h3>
    <?php $the_query = new WP_Query('showposts=4&category_name=noticias'); while ($the_query->have_posts()) : $the_query->the_post();?>
    <?php get_template_part('components/article-list'); ?>
    <?php endwhile; ?>
  </div>
</section>

