<section class="section page-sidebar">
  <div class="page-sidebar__content">
    <h3 class="page-sidebar__title">
      Más ocio de Madrid
    </h3>
    <?php $the_query = new WP_Query('showposts=8&offset=8&cat=-7,-5978,-290,-1725,-2917'); while ($the_query->have_posts()) : $the_query->the_post();?>
      <?php get_template_part('components/article-list'); ?>
    <?php endwhile; ?>
  </div>
</section>

