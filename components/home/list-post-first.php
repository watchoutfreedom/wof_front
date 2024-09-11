<section class="section page-sidebar page-sidebar--box">
<div class="page-sidebar__box">
  <a href="https://madridfree.org/gratis/" class="page-sidebar__link">
  <h2 class="page-sidebar__title">
      Madrid Gratis
    </h2>
      </a>
    <div class="page-sidebar__list">
      <?php $the_query = new WP_Query('showposts=3&cat=94'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/article-list'); ?>
      <?php endwhile; ?>
    </div>
    <a href="https://madridfree.org/gratis/" class="page-sidebar__link page-sidebar__link--btn">Ver más</a>
  </div>

  <div class="page-sidebar__box">
  <a href="https://madridfree.org/aire-libre/" class="page-sidebar__link">
    <h2 class="page-sidebar__title">
      Planes al aire libre
    </h2></a>
    <div class="page-sidebar__list">
      <?php $the_query = new WP_Query('showposts=3&cat=8564'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/article-list'); ?>
      <?php endwhile; ?>
    </div>
    <a href="https://madridfree.org/aire-libre/" class="page-sidebar__link page-sidebar__link--btn">Ver más</a>
  </div>
  
  <div class="page-sidebar__box">
  <a href="https://madridfree.org/ocio-madrid/" class="page-sidebar__link">
    <h2 class="page-sidebar__title">
      Cine, Comedia, Teatro
    </h2></a>
    <div class="page-sidebar__list">
      <?php $the_query = new WP_Query('showposts=3&cat=8563'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/article-list'); ?>
      <?php endwhile; ?>
    </div>
    <a href="https://madridfree.org/ocio-madrid/" class="page-sidebar__link page-sidebar__link--btn">Ver más</a>
  </div>

  <div class="page-sidebar__box">
  <a href="https://madridfree.org/actividades/" class="page-sidebar__link">
    <h2 class="page-sidebar__title">
      Más ocio Madrid
    </h2></a>
    <div class="page-sidebar__list">
      <?php $the_query = new WP_Query('showposts=3&cat=19'); while ($the_query->have_posts()) : $the_query->the_post();?>
        <?php get_template_part('components/article-list'); ?>
      <?php endwhile; ?>
    </div>
    <a href="https://madridfree.org/actividades/" class="page-sidebar__link page-sidebar__link--btn">Ver más</a>
  </div>
</section>

