<div class="wrap">
    <div class="wrap__box wrap__box--shop">
      <h3 class="wrap__title">Más productos</h3>
      <?php $the_query = new WP_Query('showposts=4&category_name=tienda'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/card-product); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>