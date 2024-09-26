<article class="article-list">
  <div class="article-list__thumb">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <picture class="article-list__picture picture">
        <?php the_post_thumbnail('medium', array( 'class' => 'no-lazy' )); ?>
      </picture>
    </a>
  </div>
  <div class="article-list__content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <div class="article-list__date"> <?php the_time('d F Y'); ?></div>
      <div class="article-list__responses"><?php the_field('field_66f51e6be0f82'); ?></a>
      <h3 class="article-list__title">
          <span><?php the_title(); ?></span>
      </h3>
      <div class="article-list__author"><?php the_author_posts_link(); ?></div>
    </a>
  </div>
</article>