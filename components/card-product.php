<article class="article-list">
  <div class="article-list__thumb">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <picture class="article-list__picture picture">
        <?php the_post_thumbnail('square', array( 'class' => 'no-lazy' )); ?>
      </picture>
    </a>
  </div>
  <div class="article-list__content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <?php 
      $price = get_field('field_6377e4e40ad0e'); 
      if (!empty($price) && $price != 0) : ?>
        <div class="article-list__precio">
          <?php echo esc_html($price); ?> €
        </div>
      <?php endif; ?>
      <h3 class="article-list__title">
          <?php the_title(); ?>
      </h3>
    </a>
  </div>
</article>
