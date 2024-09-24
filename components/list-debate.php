<div class="wrap wrap--list">
    <div class="wrap__box">
      <h3 class="wrap__title">Más debates</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=debate'); while ($the_query->have_posts()) : $the_query->the_post();?>
          <?php get_template_part('components/article-list'); ?>
        </div>
      <?php endwhile; ?>
</div>