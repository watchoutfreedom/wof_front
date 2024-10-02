<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>
      <p><?php get_the_author_description(); ?></p>
      <a href="<?php the_field('field_6534082571f05'); ?>">Donar</a>
    </div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>
