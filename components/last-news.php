<div class="last-news">
  <h4 class="last-news__subtitle">
    últimas noticias
  </h4>
  <?php $the_query = new WP_Query('showposts=2&offset=5'); while ($the_query->have_posts()) : $the_query->the_post();?>
    <article class="last-news__article">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="last-news__link">
        <picture class="last-news__picture picture">
          <?php the_post_thumbnail('fotogrande', array( 'class' => 'no-lazy' )); ?>
        </picture>
      </a>
      <h2 class="last-news__title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="last-news__link">
          <?php the_title(); ?>
        </a>
      </h2>
    </article>
  <?php endwhile; ?>
</div>
