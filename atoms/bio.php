<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>
      <p><?php the_author_description(); ?></p>
      <p><?php the_author_link(); ?></p>
      <a href="<?php the_field('field_6534082571f05'); ?>">Donar</a>
    </div>
  </div>
</div>
