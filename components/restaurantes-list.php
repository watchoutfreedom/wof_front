<article class="restaurantes-list__article">
    <div class="restaurantes-list__thumb">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="restaurantes-list__link">
        <picture class="restaurantes-list__picture picture">
          <?php the_post_thumbnail('large', array( 'class' => 'no-lazy' )); ?>
        </picture>
      </a>
    </div>
    <div class="restaurantes-list__content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="restaurantes-list__link">
      <h2 class="restaurantes-list__title">
          <?php the_title(); ?>
      </h2>
    </a>
    </div>
</article>
