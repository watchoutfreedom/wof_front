<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <?php the_author_posts_link(); ?>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>