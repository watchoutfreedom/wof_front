<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <?php the_author_posts_link(); ?>
    <div><?php the_field('field_63c0d44e9b300'); ?></div>
    <div><?php the_field('field_6534082571f05'); ?></div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>
