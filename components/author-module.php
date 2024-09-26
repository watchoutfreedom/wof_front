

<?php echo get_avatar( get_the_author_meta('email'), '120' ); ?> 
<p>
  <?php the_author_posts_link(); ?> 
</p>
<p class="readpost">
  (<?php the_author_posts(); ?> posts)
</p>
<p class="brevedescript">
  <?php the_author_meta('description'); ?>
</p>